@extends('layouts.customer')

@section('title')
Search Results
@stop

@section('content')
<h1 class="hidden">Items</h1>
@foreach ($items as $item)
    @include('items.partials.preview_widget')
@endforeach
@stop