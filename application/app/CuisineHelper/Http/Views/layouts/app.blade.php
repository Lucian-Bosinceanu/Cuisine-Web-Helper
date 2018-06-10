<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ css('styles') }}"/>
    <script src="{{ js('lib/jquery-3.3.1.min') }}"></script>
    <script src="{{ js('main') }}"></script>
    @yield('head')
</head>
<body>
    <div id="wrapper">
        @yield('content')
    </div>
    @yield('footer')
</body>
</html>
