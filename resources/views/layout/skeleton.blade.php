<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}">
    <title>@lang('Visitors')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/styckyfooter.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.min.css') }}">
</head>
<body>
<hr>
<hr>

<div class="container">
    @yield('main-content')
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Pollux 2023.</span>
    </div>
</footer>

<style>
    input[type="radio"], input[type="checkbox"] {
        line-height: normal;
        margin-top: 0;
        margin-bottom: 0;
    }
</style>

@include('layout.nav')


</body>
</html>
