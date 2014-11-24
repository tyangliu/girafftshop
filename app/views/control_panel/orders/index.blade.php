@extends('layouts.admin')

@section('title')
Orders
@stop

@section('content')
    <h1>Pending Orders</h1>
    @if(!$orders->isEmpty())
    <table class="cp-table">

	    <tr>
            <th>Receipt ID</th>
            <th>Ordered Date</th>
            <th>Expected Delivery Date</th>
            <th>Customer Username</th>
        </tr>
		@foreach($orders as $order)
            <tr>
            	<td><a href="{{ URL::route('cp_showOrder_path', [$order->receiptId])}}">{{ $order->receiptId }}</a></td>
            	<td>{{ $order->date}}</td>
            	<td>{{ $order->expectedDate }}</td>
            	<td>{{ $order->cUsername }}</td>
            </tr>
        @endforeach

    </table>
    @else
        <p class="center">There are no pending orders.</p>
    @endif

@stop