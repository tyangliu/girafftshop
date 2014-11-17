<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#EF941B">
    <title>Document</title>
    {{ HTML::style('css/guest.css') }}

    <script src="//use.typekit.net/qxd7bbj.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>

</head>
<body>
    <div class="outer-container">
        <div class=
            @yield('containerDiv')
            >
            @yield('side')
            <div class="content">
                @yield('content')
            </div>
            <div class="clear"></div>
        </div>
    </div>
</body>
</html>