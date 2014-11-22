@extends('layouts.customer')

@section('content')
    <h1>Shopping Cart</h1>
@if(!empty($items))

    {{ Form::open(['route'=>'updateCart_path', 'class'=>'cart-form']) }}
    <table class="shopping-cart">
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Delete</th>
        </tr>
    @foreach( $items as $upc => $item )
        {{ Form::hidden($upc . '[item_upc]', $upc) }}
        <tr>
            <td class="cart-item">
                {{ $item['entity']->title }}
            </td>
            <td class="cart-unit-price">
                {{ $item['entity']->present()->price }}
            </td>
            <td class="cart-quantity">
                {{ Form::label($upc . '[quantity]', 'Quantity', ['class' => 'hidden']) }}
                {{ Form::number($upc . '[quantity]', $item['quantity'], ['class' => 'cart-quantity-input', 'placeholder' => 'Qty.']) }}
            </td>
            <td class="cart-subtotal">${{ intToMoney($item['entity']->price * $item['quantity']) }}</td>
            <td class="cart-delete">
                <input name="{{ $upc . '[delete]' }}" type="checkbox" value="1" id="{{ $upc . '[delete]' }}">
                <label for="{{ $upc . '[delete]' }}"><span></span></label>
            </td>
        </tr>
    @endforeach
    </table>
        {{ Form::submit('Update Cart') }}
        {{ Form::button('Checkout', ['class' => 'checkout-button']) }}
    {{ Form::close() }}
@else
    <p class="center">Your cart is empty!</p>
@endif
@stop