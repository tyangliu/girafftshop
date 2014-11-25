@extends('layouts.admin')
@section('title')
Return #{{ $return->returnId }}
@stop
@section('content')
    <h1 class="order-receiptId">Return #{{ $return->returnId }}</h1>
    <?php
        $total = 0;
        foreach($returnItems as $returnItem)
        {
            $price = $returnItem->item->price;
            $quantity = $returnItem->quantity;
            $total += $price * $quantity;
        }
    ?>
    <table class="cp-table">
        <tr>
            <th>Total Refund</th>
            <th>Return Date</th>
            <th>Receipt ID</th>
            <th>Customer</th>
        </tr>
        <tr>
            <td>${{ intToMoney($total) }}</td>
            <td>{{ formatDate($return->date) }}</td>
            <td>{{ $return->order_receiptId }}</td>
            <td>{{ $return->order->cUsername }}</td>
        </tr>
    </table>

<h2 class="center">Returned Items</h2>

        <table class="cp-table order-items">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Return Qty.</th>
                <th>Refund</th>
        @foreach( $returnItems as $returnItem )
            <?php
                $price = $returnItem->item->price;
                $formattedPrice = $returnItem->item->present()->price;
                $quantity = $returnItem->quantity;
                $upc = $returnItem->item->upc;
                $title = $returnItem->item->title;
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
@stop