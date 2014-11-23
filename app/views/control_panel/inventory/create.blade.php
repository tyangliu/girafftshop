@extends('......layouts.admin')

@section('title')
Add a New Item
@stop

@section('content')
<h1>Add a new item</h1>

<?php $formErrors = $errors->all() ?>
@if ($formErrors)
    <ul>
        @foreach($formErrors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{ Form::open(array('action' => 'ItemsController@store')) }}
    <dl>
    {{-- UPC Input --}}
        <dt class="form-label">{{ Form::label('upc', 'UPC') }}</dt>
        <dd>{{ Form::text('upc', null, ['class' => 'form-control']) }}</dd>

    {{-- Title Input --}}
        <dt class="form-label">{{ Form::label('title', 'Title') }}</dt>
        <dd>{{ Form::text('title', null, ['class' => 'form-control']) }}</dd>

    {{-- Type Input --}}
        <div class="inline drop-down">
            <dt class="form-label">{{ Form::label('type', 'Type') }}</dt>
            <dd>{{ Form::select('type', array('CD' => 'CD', 'DVD' => 'DVD')) }}</dd>
        </div>

    {{-- Category Input --}}
        <div class="inline drop-down">
            <dt class="form-label">{{ Form::label('category', 'Category') }}</dt>
            <dd>{{ Form::select('category', array(
                'Rock' => 'Rock',
                'Pop' => 'Pop',
                'Country' => 'Country',
                'Classical' => 'Classical',
                'New Age' => 'New Age',
                'Instrumental' => 'Instrumental'
            ))}}</dd>
        </div>

    {{-- Company Input --}}
        <dt class="form-label">{{ Form::label('company', 'Company') }}</dt>
        <dd>{{ Form::text('company', null, ['class' => 'form-control']) }}</dd>

    {{-- Year Input --}}
        <dt class="form-label">{{ Form::label('year', 'Year') }}</dt>
        <dd>{{ Form::text('year', null, ['class' => 'form-control']) }}</dd>

    {{-- Price Input --}}
        <dt class="form-label">{{ Form::label('price', 'Price') }}</dt>
        <dd>{{ Form::text('price', null, ['class' => 'form-control']) }}</dd>

    {{-- Stock Input --}}
        <dt class="form-label">{{ Form::label('stock', 'Stock') }}</dt>
        <dd>{{ Form::text('stock', null, ['class' => 'form-control']) }}</dd>

    {{-- Lead Singer Input --}}
        <dt class="form-label">{{ Form::label('leadSingerName', 'Lead Singer') }}</dt>
        <dd>{{ Form::text('leadSingerName', null, ['class' => 'form-control']) }}</dd>

    {{-- Submit Button --}}
        <dd class="form-button">{{ Form::submit('Add New Item', ['class' => 'btn btn-primary']) }}</dd>
    </dl>
{{ Form::close() }}
@stop