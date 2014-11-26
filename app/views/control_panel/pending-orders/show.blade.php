@extends('layouts.admin')
@section('title')
Order #{{ $order->receiptId }}
@stop
@section('content')
    <h1 class="order-receiptId">Order #{{ $order->receiptId }}</h1>

    <?php $formErrors = $errors->all() ?>
    @if ($formErrors)
        <ul class="error">
            @foreach($formErrors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


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
            <th>Customer</th>
        </tr>
        <tr>
            <td>${{ intToMoney($total) }}</td>
            <td>{{ formatDate($order->date) }}</td>
            <td>{{ formatDate($order->expectedDate) }}</td>
            <td>{{ $order->cUsername }}</td>
        </tr>
    </table>
    <h2 class="center">Purchased Items</h2>
            <table class="cp-table order-items">
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty.</th>
                    <th>Subtotal</th>
                </tr>

            @foreach( $purchaseItems as $purchaseItem )
                <?php
                    $price = $purchaseItem->item->price;
                    $formattedPrice = $purchaseItem->item->present()->price;
                    $quantity = $purchaseItem->present()->quantity;
                    $upc = $purchaseItem->item->upc;
                    $title = $purchaseItem->item->title;
                    $subtotal = $price * $quantity;
                ?>
                <tr>
                    <td class="item-title">
                        {{ $title }}
                    </td>
                    <td class="order-unit-price">
                        {{ $formattedPrice }}
                    </td>
                    <td>
                        {{ $quantity }}
                    </td>
                    <td class="order-subtotal">${{ intToMoney($subtotal) }}</td>
                </tr>
            @endforeach
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