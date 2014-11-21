<div class="buy-widget">
    <div class="buy-widget-attributes">
        <h2 class="buy-widget-price">{{ $item->present()->price }}</h2>
        <span class="buy-widget-stock"><span class="stock-label">Stock:</span> {{ $item->stock }}</span>
    </div>

    {{ Form::open(['route' => 'addToCart_path']) }}
        <dl class="buy-widget-form">
            {{ Form::hidden('item_upc', $item->upc) }}
            <dt>{{ Form::label('quantity', 'Quantity', ['class' => 'hidden']) }}</dt>
            <dd class="inline">{{ Form::number('quantity', '', ['class' => 'buy-quantity', 'placeholder' => 'Qty.']) }}</dd>

            <dd class="inline">  {{ Form::submit('Add To Cart') }} </dd>
        </dl>
    {{ Form::close() }}

    <div class="clear"></div>
</div>