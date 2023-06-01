<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eUprava MUP - zahtevi za registrovanje vozila</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap5/js/bootstrap.min.js') }}"></script>

</head>
<body>
    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Marka</th>
                <th scope="col">Model</th>
                <th scope="col">Godina proizvodnje</th>
                <th scope="col">Boja</th>
                <th scope="col">Registarski broj</th>
                <th scope="col">Snaga motora</th>
                <th scope="col">Broj sedišta</th>
                <th scope="col">Maksimalna brzina</th>
                <th scope="col">Težina</th>
                <th scope="col">Tip vozila</th>
                @if($isOfficial)
                    <th scope="col">ID korisnika</th>
                    <th scope="col">Akcije</th>
                @else
                    <th scope="col">Status registracije</th>
                    <th scope="col">Prijavljena krađa</th>
                    <th scope="col">Odobrio službenik</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($vehiclesRegistration as $vehicleRegistration)
                <tr>
                    <td>{{ $vehicleRegistration->marka }}</td>
                    <td>{{ $vehicleRegistration->model }}</td>
                    <td>{{ $vehicleRegistration->godina }}</td>
                    <td>{{ $vehicleRegistration->boja }}</td>
                    <td>{{ $vehicleRegistration->regBroj }}</td>
                    <td>{{ $vehicleRegistration->snagaMotora }}</td>
                    <td>{{ $vehicleRegistration->brojSedista }}</td>
                    <td>{{ $vehicleRegistration->maksimalnaBrzina }}</td>
                    <td>{{ $vehicleRegistration->tezina }}</td>
                    <td>{{ $vehicleRegistration->tipVozila }}</td>
                    @if($isOfficial)
                        <td>{{ $vehicleRegistration->korisnik }}</td>
                        <td>
                            <form action="{{ route('manageVehicleRegistrationRequest',
                            ['id' => $vehicleRegistration->id]) }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-start">
                                    <button class="btn btn-danger btn-sm me-2" value="approve" name="action" style="font-size: 8pt"
                                            type="submit">Odobri</button>
                                    <button class="btn btn-secondary btn-sm" value="reject" name="action" style="font-size: 8pt"
                                            type="submit">Odbij</button>
                                </div>
                            </form>
                        </td>
                    @else
                        <td>{{ $vehicleRegistration->statusRegistracije }}</td>
                        <td>{{ $vehicleRegistration->prijavljenaKradja }}</td>
                        <td>{{ $vehicleRegistration->odobrioSluzbenik }}</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</body>
