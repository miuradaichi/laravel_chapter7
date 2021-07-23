@extends('layout.default')
<style>
    th{
        background-color:289ADC;
        color:white;
        padding:5px 40px;
    }
    tr:nth-chile(odd) td{
        background-color:#FFFFFF;
    }
    td{
        padding:25px 40px;
        background-color:#EEEEEE;
        text-align:center;
    }
</style>
@section('title','index.balade.php')

@section('content')
<table>
    <tr>
        <th>Data</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{$item->getDetail()}}</td>
    </tr>
    @endforeach
</table>
@endsection