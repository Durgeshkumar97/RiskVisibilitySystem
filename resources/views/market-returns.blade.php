@extends('layouts.app')

@section('content')

@php
$type = $type ?? 'usd_full';
$viewMode = $viewMode ?? 'yearly';
@endphp

<!-- DATASET TOGGLE -->

<div class="dataset-toggle">
    <a href="{{ route('market.returns',['type'=>'usd_recent','view'=>$viewMode]) }}"
       class="toggle-btn {{ $type=='usd_recent'?'active':'' }}">USD Recent</a>

    <a href="{{ route('market.returns',['type'=>'usd_full','view'=>$viewMode]) }}"
       class="toggle-btn {{ $type=='usd_full'?'active':'' }}">USD Full</a>

    <a href="{{ route('market.returns',['type'=>'local_recent','view'=>$viewMode]) }}"
       class="toggle-btn {{ $type=='local_recent'?'active':'' }}">Local Recent</a>

    <a href="{{ route('market.returns',['type'=>'local_full','view'=>$viewMode]) }}"
       class="toggle-btn {{ $type=='local_full'?'active':'' }}">Local Full</a>
</div>

<!-- VIEW TOGGLE -->

<div class="view-toggle">
    <a href="{{ route('market.returns',['type'=>$type,'view'=>'yearly']) }}"
       class="toggle-btn {{ $viewMode=='yearly'?'active':'' }}">Yearly</a>

    <a href="{{ route('market.returns',['type'=>$type,'view'=>'quarterly']) }}"
       class="toggle-btn {{ $viewMode=='quarterly'?'active':'' }}">Quarterly</a>

    <button onclick="toggleHeatmap()" class="toggle-btn">Heatmap</button>
</div>

<div class="table-wrapper">
<div class="table-scroll">

<table id="marketTable" class="market-table">

<thead>
<tr>
<th onclick="sortTable(0)">Country</th>
<th>Exchange</th>
<th>Index</th>

@foreach($headers as $header)
<th>{{ $header }}</th>
@endforeach

<th class="premium-col">CAGR</th>
<th class="premium-col">5Y CAGR</th>
<th class="premium-col">Vol</th>
<th class="premium-col">Sharpe</th>
<th class="premium-col">Max DD</th>
<th class="premium-col">Worst Yr</th>
<th class="premium-col">Pos%</th>

</tr>
</thead>

<tbody>

@foreach($data as $rowIndex=>$row)

<tr class="{{ $rowIndex>1?'blur-row':'' }}">

<td>{{ $row['country'] }}</td>
<td>{{ $row['exchange'] }}</td>
<td>{{ $row['index'] }}</td>

@if($viewMode=='yearly')
    @foreach($row['yearly'] as $v)
        <td class="heat {{ $v>=0?'positive':'negative' }}">
            {{ number_format($v,2) }}%
        </td>
    @endforeach
@else
    @foreach($row['quarterly'] as $v)
        <td class="heat {{ $v>=0?'positive':'negative' }}">
            {{ number_format($v,2) }}%
        </td>
    @endforeach
@endif

<td class="premium-col">{{ number_format($row['cagr'],2) }}%</td>
<td class="premium-col">{{ $row['rolling5']?number_format($row['rolling5'],2).'%' : '-' }}</td>
<td class="premium-col">{{ number_format($row['vol'],2) }}%</td>
<td class="premium-col">{{ number_format($row['sharpe'],2) }}</td>
<td class="premium-col negative">{{ number_format($row['drawdown'],2) }}%</td>
<td class="premium-col negative">{{ number_format($row['worst'],2) }}%</td>
<td class="premium-col">{{ number_format($row['posPct'],1) }}%</td>

</tr>

@endforeach

</tbody>
</table>

</div>

<div class="overlay-cta">
    <a href="/pricing" class="btn-primary">
        Unlock Full Market Intelligence
    </a>
</div>

</div>

<style>

.dataset-toggle,.view-toggle{
text-align:center;margin:30px 0;
}

.toggle-btn{
padding:8px 16px;border:1px solid var(--border-light);
border-radius:6px;text-decoration:none;font-weight:bold;
color:var(--text-main);margin:0 6px;background:transparent;
}

.toggle-btn.active{
background:var(--text-main);
color:var(--bg-main);
}

.market-table{
width:100%;border-collapse:collapse;
}

.market-table th,.market-table td{
padding:8px;border:1px solid var(--border-light);
text-align:center;
}

.market-table th{
position:sticky;
top:80px;
background:var(--bg-main);
cursor:pointer;
}

.positive{color:#16a34a;}
.negative{color:#dc2626;}

.blur-row{
filter:blur(4px);
opacity:0.6;
}

.premium-col{
filter:blur(4px);
opacity:0.6;
}

.overlay-cta{
position:fixed;top:0;left:0;width:100%;height:100vh;
display:flex;align-items:center;justify-content:center;
z-index:3000;pointer-events:none;
}

.overlay-cta a{pointer-events:auto;}

.heatmap td.heat.positive{
background:rgba(22,163,74,0.15);
}

.heatmap td.heat.negative{
background:rgba(220,38,38,0.15);
}

</style>

<script>

function toggleHeatmap(){
document.getElementById('marketTable').classList.toggle('heatmap');
}

function sortTable(n){
let table=document.getElementById("marketTable");
let rows=Array.from(table.rows).slice(1);
rows.sort((a,b)=>a.cells[n].innerText.localeCompare(b.cells[n].innerText));
rows.forEach(r=>table.appendChild(r));
}

</script>

@endsection  