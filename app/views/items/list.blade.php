@extends('layouts.customer')

@section('title')
Search Results
@stop

@section('content')
<h1 class="hidden">Items</h1>
@if(!$items->isEmpty())
	@foreach ($items as $item)
	    @include('items.partials.preview_widget')
	@endforeach

@else
<p class="center inventory-empty">There are no items in the inventory.</p>
@endif

@stop