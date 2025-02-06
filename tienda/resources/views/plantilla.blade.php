<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/proyectoT2/tienda/public/css/app.css">
    <script src="/proyectoT2/tienda/public/js/app.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    <title>@yield('titulo')</title>
</head>
<body>
    @include('partials.nav')
    @yield('contenido')
</body>
</html>
