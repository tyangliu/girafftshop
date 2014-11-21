<div class="item-widget">
    <h2>{{ $item->title }}</h2>
    <ul class="item-widget-attributes">
        <li><span class="attribute-label">Type: </span>{{ $item->type }}</li>
        <li><span class="attribute-label">Category: </span>{{ $item->category }}</li>
        <li><span class="attribute-label">Price: </span>{{ $item->present()->price }}</li>
    </ul>

    <a href="/items/{{ $item->upc }}">{{ Form::button('View Item',['class'=>'button']) }}</a>
</div>