<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>eUprava MUP - službenik</title>

    @component('header_component')
    @endcomponent

</head>
<body>
<div id="app">
    @component('navbar_component', ['isOfficial' => $isOfficial, 'token' => $token, 'account_type' => "redirekcija",
                                    'switch_text' => "Prijavi se kao građanin"])
    @endcomponent

        <main class="container py-5">
            <div class="row row-cols-1 row-cols-md-2 g-5">
                <div class="col">
                    <div class="card text-center">
                        <div class="card-body h-100">
                            <h5 class="card-title fs-2">Pristigli zahtevi za vozačke dozvole</h5>
                            <p class="card-text fs-5"> Ovde možete videti sve nepregledane zahteve za vozačke dozvole
                            </p>
                            <a class="btn btn-outline-light mx-1" href="/getDriverLicenseRequests">
                                <button class="btn btn-danger fs-5" style="background-color: #EF5350;">
                                    Prikaži zahteve za vozačku dozvolu</button>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-body h-100">
                            <h5 class="card-title fs-2">Pristigli zahtevi za vozila</h5>
                            <p class="card-text fs-5">Ovde možete videti sve nepregledane zahteve <br> za vozila</p>
                            <a class="btn btn-outline-light mx-1" href="/getVehicleRegistrationRequests">
                                <button class="btn btn-danger fs-5" style="background-color: #EF5350;">Prikaži zahteve za vozila</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
</div>
