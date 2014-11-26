@extends('...layouts.guest')

@section('title')
Sign Up
@stop

@section('containerDiv')
    "signup-container"
@stop

@section('content')
    <h1>Create account</h1>

    <?php $formErrors = $errors->all() ?>
    @if ($formErrors)
        <ul class="error">
            @foreach($formErrors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(array('action' => 'RegistrationController@store', 'class' => 'sign-up-form')) }}

        <dl>
        {{-- Username Input --}}
            <dt class="form-label">{{ Form::label('username', 'Username') }}</dt>
            <dd>
                @if ($errors->has('username'))
                    {{ Form::text('username', null, ['class' => 'sign-up has-error']) }}
                @else
                    {{ Form::text('username', null, ['class' => 'sign-up']) }}
                @endif
            </dd>

        {{-- Password Input --}}
            <dt class="form-label">{{ Form::label('password', 'Password') }}</dt>
            <dd>
                @if ($errors->has('password'))
                   {{ Form::password('password', ['class' => 'sign-up has-error']) }}
                @else
                   {{ Form::password('password', ['class' => 'sign-up']) }}
                @endif
            </dd>

        {{-- Name Input --}}
            <dt class="form-label">{{ Form::label('name', 'Full Name') }}</dt>
            <dd>
                @if ($errors->has('name'))
                    {{ Form::text('name', null, ['class' => 'sign-up has-error']) }}
                @else
                    {{ Form::text('name', null, ['class' => 'sign-up']) }}
                @endif
            </dd>

        {{-- Phone Input --}}
            <dt class="form-label">{{ Form::label('phone', 'Phone Number') }}</dt>
            <dd>
                @if ($errors->has('phone'))
                    {{ Form::text('phone', null, ['class' => 'sign-up has-error']) }}
                @else
                    {{ Form::text('phone', null, ['class' => 'sign-up']) }}
                @endif
            </dd>

        {{-- Address Input --}}
            <dt class="form-label">{{ Form::label('address', 'Address') }}</dt>
            <dd>
                @if ($errors->has('address'))
                    {{ Form::text('address', null, ['class' => 'sign-up has-error']) }}
                @else
                    {{ Form::text('address', null, ['class' => 'sign-up']) }}
                @endif
            </dd>

            <dd class="sign-up-button">{{ Form::submit('Sign Up') }}</dd>
        </dl>
    {{ Form::close() }}
@stop