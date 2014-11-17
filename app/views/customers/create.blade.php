@extends('layouts.guest')

@section('containerDiv')
    "signup-container"
@stop

@section('content')
    <h1>Create account</h1>

    <?php $formErrors = $errors->all() ?>
    @if ($formErrors)
        <ul>
            @foreach($formErrors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(array('action' => 'CustomersController@store', 'class' => 'sign-up-form')) }}

        <dl>
        {{-- Username Input --}}
            <dt class="form-label">{{ Form::label('username', 'Username') }}</dt>
            <dd>{{ Form::text('username', null, ['class' => 'sign-up']) }}</dd>

        {{-- Password Input --}}
            <dt class="form-label">{{ Form::label('password', 'Password') }}</dt>
            <dd>{{ Form::password('password', ['class' => 'sign-up']) }}</dd>

            <br/>

        {{-- Name Input --}}
            <dt class="form-label">{{ Form::label('name', 'Full Name') }}</dt>
            <dd>{{ Form::text('name', null, ['class' => 'sign-up']) }}</dd>

        {{-- Phone Input --}}
            <dt class="form-label">{{ Form::label('phone', 'Phone Number') }}</dt>
            <dd>{{ Form::text('phone', null, ['class' => 'sign-up']) }}</dd>

        {{-- Address Input --}}
            <dt class="form-label">{{ Form::label('address', 'Address') }}</dt>
            <dd>{{ Form::text('address', null, ['class' => 'sign-up']) }}</dd>

            <dd class="sign-up-button">{{ Form::submit('Sign Up') }}</dd>
        </dl>
    {{ Form::close() }}
@stop