<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#EF941B">
    <title>Document</title>
    {{ HTML::style('css/admin.css') }}

    <script src="//use.typekit.net/qxd7bbj.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>

</head>
<body>
    <header class="header">
        <div class="title-wrap">
            <div class="logo">{{ HTML::image('images/logo_white.svg', 'GirafftShop') }}</div>
            <div class="header-title">Control Panel</div>
        </div>
        <div class="toolbar">
            <div class="icon-set">
            <a href="" class="toolbar-icon">{{ HTML::image('images/icon_cog_white.svg', 'Options') }}</a>
            </div>
            <a href="{{ action('SessionsController@destroy') }}">{{ Form::button('Logout',['class'=>'logout-button']) }}</a>
        </div>
    </header>

    <div class="menu">
        <ul>
            <li class="menu-item current"><a href="">Dashboard</a></li>
            <li class="menu-item"><a href="">Process Refund</a></li>
            <li class="menu-item"><a href="">Add Items to Inventory</a></li>
            <li class="menu-item"><a href="">Generate Sales Report</a></li>
            <li class="menu-item"><a href="">Check Top-Selling Items</a></li>
        </ul>
    </div>

    <div class="outer-container">
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>