@extends('layouts.admin')

@section('title')
<?php $formattedDate = formatDate($date); ?>
Top Selling Items on {{ $formattedDate }}
@stop

@section('content')
<h1>Top Selling Items on {{ $formattedDate }}</h1>
@if($rows != [])
<table class="cp-table">
    <tr>
        <th>Title</th>
        <th>Company</th>
        <th>Stock</th>
        <th>Quantity Sold</th>
    </tr>

    @foreach($rows as $row)
    <tr>
        <td>{{ $row->title }}</td>
        <td>{{ $row->company }}</td>
        <td>{{$row->stock }}</td>
        <td>{{ $row->quantity  }}</td>
    </tr>
    @endforeach
</table>
@else
<p class="center">There are no sales on {{ $formattedDate }}.</p>
@endif

@stop