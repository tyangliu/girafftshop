<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#EF941B">
    <title>Document</title>
    {{ HTML::style('css/customer.css') }}

    <script src="//use.typekit.net/qxd7bbj.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>

</head>
<body>
    <header class="header">
        <div class="title-wrap">
            <div class="logo">{{ HTML::image('images/logo.svg', 'GirafftShop') }}</div>
        </div>
        <div class="toolbar">
            <div class="icon-set">
            <a href="/cart" class="toolbar-icon">{{ HTML::image('images/icon_cart.svg', 'Shopping Cart') }}</a>
            <span class="inline cart-label">
                {{ count(Session::get('cart')) }}
                {{ (count(Session::get('cart')) == 1) ? 'Item' : 'Items' }}
                {{-- json_encode(Session::get('cart')) --}}
            </span>
            <a href="" class="toolbar-icon">{{ HTML::image('images/icon_cog.svg', 'Options') }}</a>
            </div>
            <a href="{{ action('SessionsController@destroy') }}">{{ Form::button('Logout',['class'=>'logout-button']) }}</a>
        </div>
    </header>

    <div class="outer-container">
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>