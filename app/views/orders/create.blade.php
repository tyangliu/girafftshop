@extends('layouts.customer')

@section('content')
<h1>Order Items</h1>

<?php $formErrors = $errors->all() ?>
@if ($formErrors)
    <ul>
        @foreach($formErrors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{ Form::open(array('route' => 'newOrder_path')) }}
    <dl>
    {{-- Receipt ID Input --}}
        <dt class="form-label">{{ Form::label('receiptId', 'Receipt ID') }}</dt>
        <dd>{{ Form::text('receiptId', null, ['class' => 'form-control']) }}</dd>

    {{-- Date Input --}}
        <dt class="form-label">{{ Form::label('date', 'Date') }}</dt>
        <dd>{{ Form::text('date', null, ['class' => 'form-control']) }}</dd>

    {{-- Customer Username Input --}}
        <dt class="form-label">{{ Form::label('cUsername', 'Customer Username') }}</dt>
        <dd>{{ Form::text('cUsername', null, ['class' => 'form-control']) }}</dd>

    {{-- Card # Input --}}
        <dt class="form-label">{{ Form::label('card', 'Card Number') }}</dt>
        <dd>{{ Form::text('card', null, ['class' => 'form-control']) }}</dd>

    {{-- Expiry Date Input --}}
        <dt class="form-label">{{ Form::label('expiryDate', 'Expiry Date') }}</dt>
        <dd>{{ Form::text('expiryDate', null, ['class' => 'form-control']) }}</dd>

    {{-- Expected Date Input --}}
        <dt class="form-label">{{ Form::label('expectedDate', 'Expected Date') }}</dt>
        <dd>{{ Form::text('expectedDate', null, ['class' => 'form-control']) }}</dd>

    {{-- Delivered Date Input --}}
        <dt class="form-label">{{ Form::label('deliveredDate', 'Delivered Date') }}</dt>
        <dd>{{ Form::text('deliveredDate', null, ['class' => 'form-control']) }}</dd>

    {{-- Submit Button --}}
        <dd class="form-button">{{ Form::submit('Update Item', ['class' => 'btn btn-primary']) }}</dd>
    </dl>
{{ Form::close() }}
@stop