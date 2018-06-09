<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ css('styles') }}"/>
    @yield('head')
</head>
<body>
    <div id="wrapper">
        @php
        $logged = 0;
        @endphp
        
        @yield('content')
    </div>
</body>
</html>
