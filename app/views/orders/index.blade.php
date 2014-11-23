@extends('layouts.customer')

@section('title')
Orders
@stop

@section('content')
    <h1>Orders</h1>

@if(!$orders->isEmpty())
    @foreach($orders as $order)
        @include('orders.partials.order_widget')
    @endforeach
@else
    <p class="center">You don't have any orders yet!</p>
@endif

@stop