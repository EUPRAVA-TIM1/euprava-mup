<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eUprava MUP - početna</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @vite(['resources/js/app.js'])

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg" style="background-color: #EF5350;">
        <div class="container-fluid">
            <div class="d-flex flex-row bd-highlight">
                <a class="navbar-brand" href="/">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/%D0%9C%D0%B8%D0%BD%D0%B8%D1%81%D1%82%D0%B0%D1%80%D1%81%D1%82%D0%B2%D0%BE_%D0%A3%D0%BD%D1%83%D1%82%D1%80%D0%B0%D1%88%D1%9A%D0%B8%D1%85_%D0%9F%D0%BE%D1%81%D0%BB%D0%BE%D0%B2%D0%B0_%D0%A1%D1%80%D0%B1%D0%B8%D1%98%D0%B5.png"
                     alt="eUprava MUP logo" width="48" height="48" class="px-1 d-inline-block align-text-top">
                </a>
                <p class="navbar-item px-1 fs-3 text-light justify-between my-auto">
                    eUprava MUP - Vozila i vozačke dozvole
                </p>
            </div>
            <button class="btn btn-outline-light mx-1">Odjavi se</button>
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
        <div class="row row-cols-1 row-cols-md-2 g-5">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body h-100">
                        <h5 class="card-title fs-2">Informacije o vozačkoj dozvoli</h5>
                        <p class="card-text fs-5"> Ovde možete pogledati sve informacije vezano za vašu vozačku
                            dozvolu</p>
                        <a href="#" class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Prikaži informacije o vozačkoj dozvoli</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body h-100">
                        <h5 class="card-title fs-2">Zahtev za registrovanje novog vozila</h5>
                        <p class="card-text fs-5">Ovde možete podneti zahtev za registrovanje novog vozila</p>
                        <a href="#" class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Podnesi zahtev za registrovanje novog vozila</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body h-100">
                        <h5 class="card-title fs-2">Informacije o mojim vozilima</h5>
                        <p class="card-text fs-5">Ovde možete pogledati sve dostpune informacije vezane za vaša vozila</p>
                        <a href="#" class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Prikaži informacije o mojim vozilima</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body h-100">
                        <h5 class="card-title fs-2">Zahtev za obnavljanje vozačke dozvole</h5>
                        <p class="card-text fs-5">Ovde možete podneti zahtev za obnavljanje postojeće
                            vozačke dozvole</p>
                        <a href="#" class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Podnesi zahtev za obnavljanje vozačke dozvole</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body h-100">
                        <h5 class="card-title fs-2">Zahtev za izdavanje vozačke dozvole</h5>
                        <p class="card-text fs-5">Ovde možete podneti zahtev za izdavanje nove vozačke dozvole</p>
                        <a href="#" class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Podnesi zahtev za izdavanje nove vozačke dozvole</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
