@extends('layouts.customer')

@section('content')
    <h1>Shopping Cart</h1>

    {{ Form::open(['class'=>'cart-form']) }}
    <table class="shopping-cart">
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Delete</th>
        </tr>
    @foreach( $items as $quantity => $item )
        <tr>
            <td class="cart-item">
                {{ $item->title }}
            </td>
            <td class="cart-unit-price">
                {{ $item->present()->price }}
            </td>
            <td class="cart-quantity">
                {{ Form::label('quantity', 'Quantity', ['class' => 'hidden']) }}
                {{ Form::number('quantity', $quantity, ['class' => 'cart-quantity-input', 'placeholder' => 'Qty.']) }}
            </td>
            <td class="cart-subtotal">${{ intToMoney($item->price * $quantity) }}</td>
            <td class="cart-delete">
                <input name="delete" type="checkbox" value="1" id="cart-delete-checkbox">
                <label for="cart-delete-checkbox"><span></span></label>
            </td>
        </tr>
    @endforeach
    </table>
        {{ Form::button('Update Cart') }}
        {{ Form::submit('Checkout', ['class' => 'checkout-button']) }}
    {{ Form::close() }}
@stop