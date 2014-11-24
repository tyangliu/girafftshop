@extends('layouts.admin')

@section('title')
Add songs for {{ $upc }}
@stop

@section('content')
<h1>Add songs for UPC #{{ $upc }}</h1>

<?php $formErrors = $errors->all() ?>
@if ($formErrors)
    <ul>
        @foreach($formErrors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{ Form::open(array('action' => ['SongsController@store', $upc])) }}
    <dl>

        @for ($i = 0; $i < 10; $i++)
            <dd>{{ Form::text('titles[' . $i . ']', null, ['placeholder' => 'Song title']) }}</dd>
        @endfor

    {{-- Submit Button --}}
        <dd class="form-button">{{ Form::submit('Add Songs') }}</dd>
    </dl>
{{ Form::close() }}
@stop