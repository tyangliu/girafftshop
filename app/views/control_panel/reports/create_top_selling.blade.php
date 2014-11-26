@extends('layouts.admin')
@section('title')
Top Selling Items
@stop

@section('content')
<h1 class="order-receiptId">Top Selling Items</h1>

<?php $formErrors = $errors->all() ?>
    @if ($formErrors)
        <ul class="error">
            @foreach($formErrors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<div class="center">
    {{ Form::open(['route' => 'showTop_path', 'method' => 'get']) }}
    <dl>
        <dt class="form-label">{{ Form::label('date', 'Date of Top Selling') }}</dt>
        <dd>{{ Form::text('date', date('m/d/y', time())) }}</dd>

        <dt class="form-label">{{ Form::label('numberOfRows', 'Items to Display') }}</dt>
        <dd>{{ Form::text('numberOfRows') }}</dd>

        <dd class="form-button">{{ Form::submit('Get Top Selling') }}</dd>

    </dl>
    {{ Form::close() }}

</div>
@stop