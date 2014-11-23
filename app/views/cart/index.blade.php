@extends('layouts.customer')

@section('content')
    <h1>Shopping Cart</h1>
@if(!empty($items))

    {{ Form::open(['route'=>'updateCart_path', 'class'=>'cart-form']) }}
    <table class="shopping-cart">
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Qty.</th>
            <th>Subtotal</th>
            <th>Delete</th>
        </tr>

    <?php $total = 0 ?>
    @foreach( $items as $upc => $item )
        <?php $total += $item['entity']->price * $item['quantity'] ?>
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
        <tr>
            <td class="cart-total-price" colspan="100">
                <h2>Total Price: ${{ intToMoney($total) }}</h2>
            </td>
        </tr>
    </table>
        {{ Form::submit('Update Cart') }}
        <a href="{{ action('OrdersController@create') }}">
            {{ Form::button('Checkout', ['class' => 'checkout-button']) }}
        </a>
    {{ Form::close() }}
@else
    <p class="center">Your cart is empty!</p>
@endif
@stop