@extends('layouts.customer')

@section('content')
    <h1 class="order-receiptId">Order #{{ $order->receiptId }}</h1>

    {{ Form::open(['route'=>'updateCart_path', 'class'=>'cart-form']) }}
        <table class="shopping-cart">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Subtotal</th>
                <th>Return</th>
                <th>Return Qty.</th>
            </tr>

        <?php $total = 0 ?>
        @foreach( $purchaseItems as $purchaseItem )
            <?php
                $price = $purchaseItem->item->price;
                $formattedPrice = $purchaseItem->item->present()->price;
                $quantity = $purchaseItem->quantity;
                $upc = $purchaseItem->item->upc;
                $title = $purchaseItem->item->title;
                $subtotal = $price * $quantity;

                $total += $subtotal;
            ?>
            {{ Form::hidden($upc . '[item_upc]', $upc) }}
            <tr>
                <td class="cart-item">
                    {{ $title }}
                </td>
                <td class="order-unit-price">
                    {{ $formattedPrice }}
                </td>
                <td>
                    {{ $quantity }}
                </td>
                <td class="order-subtotal">${{ intToMoney($subtotal) }}</td>
                <td class="order-return">
                    <input name="{{ $upc . '[return]' }}" type="checkbox" value="1" id="{{ $upc . '[return]' }}">
                    <label for="{{ $upc . '[return]' }}"><span></span></label>
                </td>
                <td class="return-quantity">
                    {{ Form::label($upc . '[quantity]', 'Quantity', ['class' => 'hidden']) }}
                    {{ Form::number($upc . '[quantity]', null, ['class' => 'return-quantity-input', 'placeholder' => 'Qty.']) }}
                </td>
            </tr>
        @endforeach
            <tr>
                <td class="cart-total-price" colspan="100">
                    <h2>Total Price: ${{ intToMoney($total) }}</h2>
                </td>
            </tr>
        </table>
            {{ Form::submit('Return Selected Items') }}
        {{ Form::close() }}
@stop