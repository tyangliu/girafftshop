@extends('layouts.customer')

@section('title')
{{ $item->title }}
@stop

@section('content')
    <h1 class="item-title">{{ $item->title }}</h1>
    @if( $item->leadSinger )
        <h2 class="singer-name">by {{ $item->leadSinger->name }}</h2>
    @endif
    @include('items.partials.info_widget')
    @include('items.partials.buy_widget')
@stop