@extends('layouts.admin')

@section('title')
Returnable Orders
@stop

@section('content')
    <h1>Returnable Orders</h1>
    @if(!$orders->isEmpty())
    <table class="cp-table">

	    <tr>
            <th>Receipt ID</th>
            <th>Order Date</th>
            <th>Estimated Delivery Date</th>
            <th>Customer</th>
        </tr>
		@foreach($orders as $order)
            <tr>
            	<td><a href="{{ URL::route('showReturnable_path', [$order->receiptId]) }}">{{ $order->receiptId }}</a></td>
            	<td>{{ formatDate($order->date) }}</td>
            	<td>{{ formatDate($order->expectedDate) }}</td>
            	<td>{{ $order->cUsername }}</td>
            </tr>
        @endforeach

    </table>
    @else
        <p class="center">There are no orders eligible for return.</p>
    @endif

@stop