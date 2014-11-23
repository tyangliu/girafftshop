@extends('layouts.customer')

@section('content')
<h1>Checkout</h1>

<?php $formErrors = $errors->all() ?>
@if ($formErrors)
    <ul>
        @foreach($formErrors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{ Form::open(array('route' => 'newOrder_path', 'class' => 'order-form')) }}
    @include('orders.partials.summary_widget')

{{ Form::open(array('route' => 'newOrder_path', 'class' => 'order-form')) }}
    <dl>
    {{-- Card # Input --}}
        <dt class="form-label">{{ Form::label('card', 'Card Number') }}</dt>
        <dd>{{ Form::text('card', null, ['class' => 'form-control']) }}</dd>

    {{-- Expiry Date Input --}}
        <dt class="form-label">{{ Form::label('expiryDate', 'Expiry Date') }}</dt>
        <dd>{{ Form::text('expiryDate', null, ['class' => 'form-control']) }}</dd>
    {{-- Submit Button --}}
        <dd class="form-button">{{ Form::submit('Make Order', ['class' => 'btn btn-primary']) }}</dd>
    </dl>
{{ Form::close() }}
@stop