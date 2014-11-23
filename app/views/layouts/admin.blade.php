<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#EF941B">
    <title>@yield('title') - GirafftShop Control Panel</title>
    {{ HTML::style('css/admin.css') }}

    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
    {{ HTML::script('js/menu-toggle.js') }}
    {{ HTML::script('//use.typekit.net/qxd7bbj.js') }}
    <script>try{Typekit.load();}catch(e){}</script>

</head>
<body>
    <header class="header">
        <div class="title-wrap">
            <a href=""><div class="logo">{{ HTML::image('images/logo_white.svg', 'GirafftShop') }}</div>
            <div class="header-title">Control Panel</div></a>
        </div>
        <div class="toolbar">
            <div class="icon-set">
            <span class="toolbar-icon options-switch">{{ HTML::image('images/icon_cog_white.svg', 'Options') }}</span>
            </div>
            <a href="{{ action('SessionsController@destroy') }}">{{ Form::button('Logout',['class'=>'logout-button']) }}</a>
            @include('layouts.partials.admin_options')
        </div>
    </header>

    @include('layouts.partials.menu')

    <div class="outer-container">
        <div class="content">
            @yield('content')
        </div>
    </div>
    @include('layouts.partials.footer')
</body>
</html>