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
                <th scope="col">Snaga motora</th>
                <th scope="col">Maksimalna brzina</th>
                <th scope="col">Broj sedišta</th>
                <th scope="col">Težina</th>
                <th scope="col">Tip vozila</th>
                <th scope="col">ID korisnika</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($vehicleRegistrationRequests as $vehicleRegistrationRequest)
                <tr>
                    <td>{{ $vehicleRegistrationRequest->brand }}</td>
                    <td>{{ $vehicleRegistrationRequest->model }}</td>
                    <td>{{ $vehicleRegistrationRequest->year }}</td>
                    <td>{{ $vehicleRegistrationRequest->color }}</td>
                    <td>{{ $vehicleRegistrationRequest->engine_power }}</td>
                    <td>{{ $vehicleRegistrationRequest->max_speed }}</td>
                    <td>{{ $vehicleRegistrationRequest->num_of_seats }}</td>
                    <td>{{ $vehicleRegistrationRequest->weight }}</td>
                    <td>{{ $vehicleRegistrationRequest->vehicle_type }}</td>
                    <td>{{ $vehicleRegistrationRequest->user_id }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</body>
