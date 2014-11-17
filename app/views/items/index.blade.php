@extends('layouts.customer')

@section('content')
<h1>What are you looking for today?</h1>

{{ Form::open(array('route' => 'search_path')) }}
    <dl>
    {{-- Category Input --}}
        <dt class="form-label">{{ Form::label('category', 'Category') }}</dt>
        <dd>{{ Form::text('category', null, ['class' => 'form-control']) }}</dd>

    {{-- Title Input --}}
        <dt class="form-label">{{ Form::label('title', 'Title') }}</dt>
        <dd>{{ Form::text('title', null, ['class' => 'form-control']) }}</dd>

    {{-- Artist Input --}}
        <dt class="form-label">{{ Form::label('artist', 'Artist') }}</dt>
        <dd>{{ Form::text('artist', null, ['class' => 'form-control']) }}</dd>

        <dd class="form-button">{{ Form::submit('Find It!') }}</dd>
    </dl>
{{ Form::close() }}
@stop