@extends('layouts.admin')

@section('content')
<h1>Update an item</h1>

<?php $formErrors = $errors->all() ?>
@if ($formErrors)
    <ul>
        @foreach($formErrors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{ Form::open(array('route' => 'editItem_path')) }}
    <dl>
    {{-- UPC Input --}}
        <dt class="form-label">{{ Form::label('upc', 'UPC') }}</dt>
        <dd>{{ Form::text('upc', null, ['class' => 'form-control']) }}</dd>

    {{-- Stock Input --}}
        <dt class="form-label">{{ Form::label('stock', 'Quantity to Add') }}</dt>
        <dd>{{ Form::text('stock', null, ['class' => 'form-control']) }}</dd>

    {{-- Price Input --}}
        <dt class="form-label">{{ Form::label('price', 'Price') }}</dt>
        <dd>{{ Form::text('price', null, ['class' => 'form-control']) }}</dd>

    {{-- Submit Button --}}
        <dd class="form-button">{{ Form::submit('Update Item', ['class' => 'btn btn-primary']) }}</dd>
    </dl>
{{ Form::close() }}
@stop