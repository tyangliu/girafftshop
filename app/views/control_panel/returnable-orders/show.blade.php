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
            @if($order->deliveredDate != null)
            <th>Delivered On</th>
            @endif
        </tr>
        <tr>
            <td>${{ intToMoney($total) }}</td>
            <td>{{ formatDate($order->date) }}</td>
            <td>{{ formatDate($order->expectedDate) }}</td>
            @if($order->deliveredDate != null)
            <td>{{ formatDate($order->deliveredDate) }}</td>
            @endif
        </tr>
    </table>
    <h2 class="center">Purchased Items</h2>
    @if($returnable)
        {{ Form::open(['route'=>'returnItems_path']) }}
        {{ Form::hidden('receiptId', $order->receiptId) }}
    @endif
        <table class="cp-table order-items">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Subtotal</th>
    @if($returnable)
                <th class="center">Return</th>
                <th>Return Qty.</th>
    @endif
            </tr>

        @foreach( $purchaseItems as $purchaseItem )
            <?php
                $price = $purchaseItem->item->price;
                $formattedPrice = $purchaseItem->item->present()->price;
                $quantity = $purchaseItem->quantity;
                $upc = $purchaseItem->item->upc;
                $title = $purchaseItem->item->title;
                $subtotal = $price * $quantity;
            ?>
            {{ Form::hidden($upc . '[item_upc]', $upc) }}
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
    @if($returnable)
                <td class="order-return">
                    <input name="{{ $upc . '[return]' }}" type="checkbox" value="1" id="{{ $upc . '[return]' }}">
                    <label for="{{ $upc . '[return]' }}"><span></span></label>
                </td>
                <td class="return-quantity">
                    {{ Form::label($upc . '[quantity]', 'Quantity', ['class' => 'hidden']) }}
                    {{ Form::number($upc . '[quantity]', null, [
                        'class' => 'return-quantity-input',
                        'placeholder' => 'Qty.'
                    ]) }}
                </td>
    @endif
            </tr>
        @endforeach
        </table>
    @if($returnable)
            <dd class="form-button">{{ Form::submit('Return Selected Items') }}</dd>
        {{ Form::close() }}
    @endif
@stop