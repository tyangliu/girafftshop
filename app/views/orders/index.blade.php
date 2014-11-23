@extends('layouts.customer')

@section('content')
    <h1>Your Orders</h1>

@if(!$orders->isEmpty())
    @foreach($orders as $order)
        @include('orders.partials.order_widget')
    @endforeach
@else
    <p class="center">You don't have any orders yet!</p>
@endif

@stop