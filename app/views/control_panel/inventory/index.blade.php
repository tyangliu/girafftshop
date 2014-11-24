@extends('layouts.admin')

@section('title')
Inventory
@stop

@section('content')
<h1>Inventory</h1>
    <table class="cp-table">
        <tr>
            <th>Title</th>
            <th>UPC</th>
            <th>Stock</th>
            <th>Price</th>
        </tr>
    @foreach($items as $item)
        <tr>

            <td><a href="{{ URL::route('editItem_path', [$item->upc]) }}">{{ $item->title }}</a></td>
            <td>{{ $item->upc }}</td>
            <td>{{ $item->stock }}</td>
            <td>${{ intToMoney($item->price) }}</td>

        </tr>
    @endforeach
    </table>
<div class="center">
    <a href="{{ action('ItemsController@create') }}">
        {{ Form::button('Add New Item') }}
    </a>
</div>

@stop