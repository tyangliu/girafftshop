@extends('layouts.admin')
@section('title')
Generate Sales Report
@stop

@section('content')
<h1 class="order-receiptId">Generate Sales Report</h1>

	<?php $formErrors = $errors->all() ?>
    @if ($formErrors)
        <ul class="error">
            @foreach($formErrors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

<div class="center">
    {{ Form::open(['route' => 'showSales_path', 'method' => 'get']) }}
    <dl>
        <dt class="form-label">{{ Form::label('date', 'Date of Sales Report') }}</dt>
        <dd>{{ Form::text('date', date('m/d/y', time())) }}</dd>
        <dd class="form-button">{{ Form::submit('Generate Sales Report') }}</dd>

    </dl>
    {{ Form::close() }}

</div>
@stop