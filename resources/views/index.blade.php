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

    <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap5/js/bootstrap.min.js') }}"></script>

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
            <a class="btn btn-outline-light mx-1" href="/getVehicleRegistrationRequests">Zahtevi</a>
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
                        <button class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Prikaži informacije o vozačkoj dozvoli</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body h-100">
                        <h5 class="card-title fs-2">Zahtev za registraciju novog vozila</h5>
                        <p class="card-text fs-5">Ovde možete podneti zahtev za registraciju novog vozila</p>
                        <button href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Podnesi zahtev za registraciju novog vozila</button>
                        <div class="modal" tabindex="-1" id="exampleModal">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-4">
                                            Zahtev za registraciju novog vozila:
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" accept-charset="UTF-8" action="{{
                                            route('vehicleRegistrationRequest')}}">

                                            @csrf <!-- {{ csrf_field() }} -->

                                            <div class="form-group mb-2 mx-1">
                                                <label for="brand">Marka:</label>
                                                <input type="text" class="form-control text-center mt-2" id="brand"
                                                       name="brand" required>
                                            </div>
                                            <div class="form-group mb-2 mx-1">
                                                <label for="model">Model:</label>
                                                <input type="text" class="form-control text-center mt-2" id="model"
                                                       name="model" required>
                                            </div>
                                            <div class="form-group mb-2 mx-1">
                                                <label for="year">Godina proizvodnje:</label>
                                                <input type="number" class="form-control text-center mt-2" id="year"
                                                       name="year" min="1900" max="2099" required>
                                            </div>
                                            <div class="form-group mb-2 mx-1">
                                                <label for="color">Boja:</label>
                                                <input type="text" class="form-control text-center mt-2" id="color"
                                                       name="color" required>
                                            </div>
                                            <div class="form-group mb-2 mx-1">
                                                <label for="engine_power">Snaga motora:</label>
                                                <input type="number" class="form-control text-center mt-2"
                                                       id="engine_power" name="engine_power" min="1" max="10000"
                                                       required>
                                            </div>
                                            <div class="form-group mb-2 mx-1">
                                                <label for="max_speed">Maksimalna brzina:</label>
                                                <input type="number" class="form-control text-center mt-2"
                                                       id="max_speed" name="max_speed" min="1" max="500" required>
                                            </div>
                                            <div class="form-group mb-2 mx-1">
                                                <label for="num_of_seats">Broj sedišta:</label>
                                                <input type="number" class="form-control text-center mt-2"
                                                       id="num_of_seats" name="num_of_seats" min="1" max="100"
                                                       required>
                                            </div>
                                            <div class="form-group mb-2 mx-1">
                                                <label for="weight">Težina:</label>
                                                <input type="number" class="form-control text-center mt-2" id="weight"
                                                       name="weight" min="1" max="100000" required>
                                            </div>
                                            <div class="form-group mb-2 mx-1">
                                                <label for="vehicle_type">Tip vozila:</label>
                                                <select class="form-select mt-2" id="vehicle_type"
                                                        name="vehicle_type" required>
                                                    <option value="">Izaberi ...</option>
                                                    <option value="PUTNICKO_VOZILO">Putničko vozilo</option>
                                                    <option value="TERETNO_VOZILO">Teretno vozilo</option>
                                                    <option value="AUTOBUS">Autobus</option>
                                                    <option value="KAMION">Kamion</option>
                                                    <option value="MOTORNI_BICIKL">Motorni bicikl</option>
                                                    <option value="SKUTER">Skuter</option>
                                                    <option value="MOTORNO_TRICIKLO">Motorno triciklo</option>
                                                    <option value="MOTORNI_CETVOROCIKL">Motorno četvorociklo</option>
                                                    <option value="PRIKLJUCNO_VOZILO">Priključno vozilo</option>
                                                    <option value="SPECIJALNO_VOZILO">Specijalno vozilo</option>
                                                </select>
                                            </div>
                                            <div class="d-flex flex-row-reverse mx-1">
                                                <button type="submit" class="btn text-white fs-5 px-5 mt-3 w-100"
                                                        style="background-color: #EF5350;">Podnesi zahtev</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
