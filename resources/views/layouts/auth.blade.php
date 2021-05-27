<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') Eventos App</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

</head>
<body>
    <div class="container">
        @yield('content') <!-- Todas as views que extenderem desta colocarão seu conteúdo nesta área -->
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
