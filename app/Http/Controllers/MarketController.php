<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function returns()
    {
        $file = public_path('data/global_exchange_yearwise_returns.csv');

        $data = array_map('str_getcsv', file($file));

        $header = array_shift($data);

        $returns = [];

        foreach ($data as $row) {
            $returns[] = array_combine($header, $row);
        }

        return view('market-returns', compact('returns', 'header'));
    }
}
