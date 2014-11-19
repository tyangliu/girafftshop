@extends('layouts.customer')

@section('content')
<h1>Items</h1>
@foreach ($items as $item)
    <ul>
        <li><b>UPC:</b> {{ $item->upc }}</li>
        <li><b>Title:</b> {{ $item->title }}</li>
        <li><b>Type:</b> {{ $item->type }}</li>
        <li><b>Category:</b> {{ $item->category }}</li>
        <li><b>Company:</b> {{ $item->company }}</li>
        <li><b>Year:</b> {{ $item->year }}</li>
        <li><b>Price:</b> {{ $item->price }}</li>
        <li><b>Stock:</b> {{ $item->stock }}</li>
        <li><b>LeadSinger:</b> {{ json_encode($item->leadSinger()) }}</li>
    </ul>
@endforeach
@stop