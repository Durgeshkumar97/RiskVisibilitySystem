<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function returns(Request $request)
    {
        $type = $request->get('type', 'usd_full');
        $viewMode = $request->get('view', 'yearly');

        $files = [
            'usd_full'     => 'quarterly_usd_full.csv',
            'usd_recent'   => 'quarterly_usd_recent.csv',
            'local_full'   => 'quarterly_local_full.csv',
            'local_recent' => 'quarterly_local_recent.csv',
        ];

        $filename = $files[$type] ?? $files['usd_full'];
        $path = storage_path('app/data/' . $filename);

        if (!file_exists($path)) {
            return view('market-returns', [
                'data' => [],
                'headers' => [],
                'type' => $type,
                'viewMode' => $viewMode
            ]);
        }

        $csv = array_map('str_getcsv', file($path));
        $header = $csv[0];
        unset($csv[0]);

        $quarterLabels = array_slice($header, 3);

        $years = [];
        foreach ($quarterLabels as $label) {
            $year = substr($label, 0, 4);
            if (!in_array($year, $years)) $years[] = $year;
        }

        $data = [];

        foreach ($csv as $row) {

            $quarterReturns = array_map('floatval', array_slice($row, 3));

            /* YEARLY */
            $yearly = [];
            foreach ($quarterLabels as $i => $label) {
                $year = substr($label, 0, 4);
                if (!isset($yearly[$year])) $yearly[$year] = 1;
                $yearly[$year] *= (1 + $quarterReturns[$i] / 100);
            }
            foreach ($yearly as $y => $v) {
                $yearly[$y] = ($v - 1) * 100;
            }

            /* CAGR */
            $growth = 1;
            foreach ($quarterReturns as $r) $growth *= (1 + $r/100);
            $yearsCount = count($quarterReturns)/4;
            $cagr = pow($growth, 1/$yearsCount) - 1;

            /* Rolling 5Y CAGR */
            $rolling5 = null;
            if (count($quarterReturns) >= 20) {
                $last20 = array_slice($quarterReturns, -20);
                $g = 1;
                foreach ($last20 as $r) $g *= (1 + $r/100);
                $rolling5 = pow($g, 1/5) - 1;
            }

            /* Volatility */
            $mean = array_sum($quarterReturns)/count($quarterReturns);
            $var = 0;
            foreach ($quarterReturns as $r) {
                $var += pow($r - $mean, 2);
            }
            $var /= count($quarterReturns);
            $vol = sqrt($var) * sqrt(4);

            /* Sharpe */
            $sharpe = $vol != 0 ? $cagr/$vol : 0;

            /* Max Drawdown */
            $peak = 1;
            $equity = 1;
            $maxDD = 0;

            foreach ($quarterReturns as $r) {
                $equity *= (1 + $r/100);
                if ($equity > $peak) $peak = $equity;
                $dd = ($equity - $peak)/$peak;
                if ($dd < $maxDD) $maxDD = $dd;
            }

            /* Worst Year */
            $worst = min($yearly);

            /* Positive Year % */
            $positive = count(array_filter($yearly, fn($v)=>$v>0));
            $posPct = ($positive/count($yearly))*100;

            $data[] = [
                'country'=>$row[0],
                'exchange'=>$row[1],
                'index'=>$row[2],
                'yearly'=>$yearly,
                'quarterly'=>array_combine($quarterLabels,$quarterReturns),
                'cagr'=>$cagr*100,
                'rolling5'=>$rolling5 ? $rolling5*100 : null,
                'vol'=>$vol,
                'sharpe'=>$sharpe,
                'drawdown'=>$maxDD*100,
                'worst'=>$worst,
                'posPct'=>$posPct
            ];
        }

        $headers = $viewMode=='yearly' ? $years : $quarterLabels;

        return view('market-returns', compact('data','headers','type','viewMode'));
    }
} 