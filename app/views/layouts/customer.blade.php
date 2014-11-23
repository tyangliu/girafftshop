<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#EF941B">
    <title>@yield('title') - GirafftShop</title>
    {{ HTML::style('css/customer.css') }}

    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
    {{ HTML::script('js/menu-toggle.js') }}
    {{ HTML::script('//use.typekit.net/qxd7bbj.js') }}
    <script>try{Typekit.load();}catch(e){}</script>

</head>
<body>
    <header class="header">
        <div class="title-wrap">
            <a href="/"><div class="logo">{{ HTML::image('images/logo.svg', 'GirafftShop') }}</div></a>
        </div>
        <div class="toolbar">
            <div class="icon-set">
            <a href="{{ URL::route('cart_path') }}" class="toolbar-icon">{{ HTML::image('images/icon_cart.svg', 'Shopping Cart') }}</a>
            <span class="inline cart-label">
                {{ count(Session::get('cart')) }}
                {{ (count(Session::get('cart')) == 1) ? 'Item' : 'Items' }}
            </span>
            <span class="toolbar-icon options-switch">{{ HTML::image('images/icon_cog.svg', 'Options') }}</span>
            </div>
            <a href="{{ action('SessionsController@destroy') }}">{{ Form::button('Logout',['class'=>'logout-button']) }}</a>
            @include('layouts.partials.customer_options')
        </div>
    </header>

    <div class="outer-container">
        <div class="content">
            @yield('content')
        </div>
    </div>
    @include('layouts.partials.footer')
</body>
</html>