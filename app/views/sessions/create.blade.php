@extends('layouts.guest')

@section('title')
Sign In
@stop

@section('containerDiv')
    "signin-container"
@stop

@section('side')
    <div class="giraffe"></div>
@stop

@section('content')
    <h1 class="logo">{{ HTML::image('images/logo_textOnly.svg', 'GirafftShop') }}</h1>

    {{ Form::open(array('route' => 'login_path')) }}
        <dl>
            <dt>{{ Form::label('username', 'Username', ['class' => 'hidden']) }}</dt>
            <dd>{{ Form::text('username', null, ['class' => 'sign-in', 'placeholder' => 'username']) }}</dd>

            <dt>{{ Form::label('password', 'Password', ['class' => 'hidden']) }}</dt>
            <dd>{{ Form::password('password', ['class' => 'sign-in', 'placeholder' => 'password']) }}</dd>

            <dd class="inline">  {{ Form::submit('Sign In') }} </dd>
            <div class="inline remember-me">
               <input name="remember" type="checkbox" value="1" id="remember">
               <label for="remember"> <span></span> Remember Me!</label>
            </div>
        </dl>

    {{ Form::close() }}

    <p class="center">New kid around the block? <a href='{{ route('signup_path') }}'>Sign up</a>.</p>
@stop