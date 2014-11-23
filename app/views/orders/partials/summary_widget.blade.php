<table class="summary-widget">
    <tr>
<<<<<<< HEAD
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
<?php $total = 0 ?>
 @foreach( $items as $upc => $item )
    <?php $total += $item['entity']->price * $item['quantity'] ?>
    <tr>
    {{-- TODO: FIX CLASSES --}}
        <td class="cart-item">
            {{ $item['entity']->title }}
        </td>
        <td class="cart-unit-price">
            {{ $item['entity']->present()->price }}
        </td>
        <td class="cart-quantity">
            {{ $item['quantity'] }}
        </td>
        <td class="cart-subtotal">${{ intToMoney($item['entity']->price * $item['quantity']) }}</td>
    </tr>
@endforeach
    <tr>
        <td class="cart-total-price" colspan="100">
            <h2>Total Price: ${{ intToMoney($total) }}</h2>
        </td>
=======
        <th class="attribute-label">Type</th>
        <td>{{ 'Test' }}</td>
        <th class="attribute-label">Company</th>
        <td>{{ 'Potato' }}</td>
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
    </tr>
</table>