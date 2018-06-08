<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('head')
    <link rel="stylesheet" href="{{ css('styles') }}"/>
</head>
<body>
    <div id="wrapper">
        @yield('content')
    </div>
</body>
</html>
