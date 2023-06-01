<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>eUprava MUP - početna</title>

    @component('header_component')
    @endcomponent

</head>
<body>
<div id="app">
    @component('navbar_component', ['isOfficial' => $isOfficial, 'token' => $token, 'account_type' => "official",
                                    'switch_text' => "Prijavi se kao službeno lice"])
    @endcomponent

    <main class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 g-5">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title fs-2">Informacije o vozačkoj dozvoli</h5>
                        <p class="card-text fs-5"> Ovde možete pogledati sve informacije vezano za vašu vozačku
                            dozvolu</p>
                        <button data-bs-toggle="modal" data-bs-target="#getDrivingLicenseDataModal"
                                class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Prikaži informacije o vozačkoj dozvoli</button>
                        @component('get_driving_license_data_modal', ['drivingLicenseData' => $drivingLicenseData->getData()])
                        @endcomponent

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title fs-2">Zahtev za registraciju novog vozila</h5>
                        <p class="card-text fs-5">Ovde možete podneti zahtev za registraciju <br> novog vozila</p>
                        <button data-bs-toggle="modal" data-bs-target="#registerNewVehicleModal"
                                class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Podnesi zahtev za registraciju novog vozila</button>
                        @component('register_new_vehicle_modal')
                        @endcomponent
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title fs-2">Informacije o mojim vozilima</h5>
                        <p class="card-text fs-5">Ovde možete pogledati sve dostpune informacije vezane za vaša vozila</p>
                        <a class="btn btn-outline-light mx-1" href="/myVehicles">
                            <button class="btn btn-danger fs-5" style="background-color: #EF5350;">
                                Prikaži informacije o mojim vozilima</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
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
                    <div class="card-body">
                        <h5 class="card-title fs-2">Zahtev za izdavanje vozačke dozvole</h5>
                        <p class="card-text fs-5">Ovde možete podneti zahtev za izdavanje nove vozačke dozvole</p>
                        <button data-bs-toggle="modal" data-bs-target="#driverLicenseRequestModal"
                                class="btn btn-danger fs-5" style="background-color: #EF5350;">
                            Podnesi zahtev za izdavanje vozačke dozvole</button>
                        @component('request_driving_license_modal')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
