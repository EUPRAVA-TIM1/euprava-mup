<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eUprava MUP - neuspešna autorizacija</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap5/js/bootstrap.min.js') }}"></script>

</head>
<body>
<div class="container mt-5">
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Error:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                Greška - Internal Server Error!
            </div>

            <!-- Add more modular error handling !-->
    </div>
</div>
</body>
