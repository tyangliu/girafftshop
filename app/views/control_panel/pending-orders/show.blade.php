@extends('layouts.admin')
@section('title')
Order #{{ $order->receiptId }}
@stop
@section('content')
    <h1 class="order-receiptId">Order #{{ $order->receiptId }}</h1>
    <?php
        $total = 0;
        foreach($purchaseItems as $purchaseItem)
        {
            $price = $purchaseItem->item->price;
            $quantity = $purchaseItem->quantity;
            $total += $price * $quantity;
        }
    ?>
    <table class="cp-table">
        <tr>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Estimated Delivery Date</th>
        </tr>
        <tr>
            <td>${{ intToMoney($total) }}</td>
            <td>{{ formatDate($order->date) }}</td>
            <td>{{ formatDate($order->expectedDate) }}</td>
        </tr>
    </table>

    <div class="center">
        {{ Form::open(['route' => ['cp_showOrder_path', $order->receiptId]]) }}
        <dl>
            <dt class="form-label">{{ Form::label('deliveredDate', 'Delivered On') }}</dt>
            <dd>{{ Form::text('deliveredDate', date('m/d/y', time()), ['class' => 'form-control']) }}</dd>
            <dd class="form-button">{{ Form::submit('Update Selected Order') }}</dd>

        </dl>
        {{ Form::close() }}

    </div>
@stop