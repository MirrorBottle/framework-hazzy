<!DOCTYPE html>
<html lang="en" data-theme="hazzy">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Hazzy - @yield('title')</title>
</head>

<body>
    @include('web.layouts.header')
    @yield('content')
    @include('web.layouts.footer')
</body>

</html>
