<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eUprava MUP - zahtevi za vozače dozvole</title>

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
            <th scope="col">Broj Vozacke Dozvole</th>
            <th scope="col">Kategorije Vozila</th>
            <th scope="col">Korisnik</th>
            <th scope="col">Akcije</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($driverLicenseRequests as $driverLicenseRequest)
            <tr>
                @php
                    $kategorijeVozila = array_map(function($item) {
                    return strtoupper($item);
                }, unserialize($driverLicenseRequest->katergorijeVozila));
                @endphp
                <td>{{ $driverLicenseRequest->brojVozackeDozvole }}</td>
                <td>
                    @foreach ($kategorijeVozila as $key => $kategorija)
                        <span>{{$kategorija}}</span>
                        @if ($key < count($kategorijeVozila) - 1)
                            <span>,</span>
                        @endif
                    @endforeach
                </td>
                <td>{{ $driverLicenseRequest->korisnik }}</td>
                <td>
                    <form action="{{ route('manageDrivingLicenseRequest',
                            ['id' => $driverLicenseRequest->id]) }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-start">
                            <button class="btn btn-danger btn-sm me-2" value="approve" name="action" style="font-size: 8pt"
                                    type="submit">
                                Odobri</button>
                            <button class="btn btn-secondary btn-sm" value="reject" name="action" style="font-size: 8pt"
                                    type="submit">Odbij</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
