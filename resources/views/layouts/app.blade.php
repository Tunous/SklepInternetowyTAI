<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projekt z TAI</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <script src="{{ asset('/js/app.js') }}"></script>
</head>

<body>
@include('common.nav')
@yield('header')
@yield('content')
@include('common.footer')
</body>
</html>
