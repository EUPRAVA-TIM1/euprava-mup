<nav class="navbar navbar-expand-lg" style="background-color: #EF5350;">
    <div class="container-fluid">
        <div class="d-flex flex-row bd-highlight">
            @if($switch_text == "Prijavi se kao službeno lice")
                <a class="navbar-brand" href="{{ route('redirekcija', ['token' => session('token')]) }}">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/%D0%9C%D0%B8%D0%BD%D0%B8%D1%81%D1%82%D0%B0%D1%80%D1%81%D1%82%D0%B2%D0%BE_%D0%A3%D0%BD%D1%83%D1%82%D1%80%D0%B0%D1%88%D1%9A%D0%B8%D1%85_%D0%9F%D0%BE%D1%81%D0%BB%D0%BE%D0%B2%D0%B0_%D0%A1%D1%80%D0%B1%D0%B8%D1%98%D0%B5.png"
                         alt="eUprava MUP logo" width="48" height="48" class="px-1 d-inline-block align-text-top">
                </a>
            @else
                <a class="navbar-brand" href="{{ route('official', ['token' => session('token')]) }}">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/%D0%9C%D0%B8%D0%BD%D0%B8%D1%81%D1%82%D0%B0%D1%80%D1%81%D1%82%D0%B2%D0%BE_%D0%A3%D0%BD%D1%83%D1%82%D1%80%D0%B0%D1%88%D1%9A%D0%B8%D1%85_%D0%9F%D0%BE%D1%81%D0%BB%D0%BE%D0%B2%D0%B0_%D0%A1%D1%80%D0%B1%D0%B8%D1%98%D0%B5.png"
                         alt="eUprava MUP logo" width="48" height="48" class="px-1 d-inline-block align-text-top">
                </a>
            @endif
            <p class="navbar-item px-1 fs-3 text-light justify-between my-auto">
                eUprava MUP - Vozila i vozačke dozvole
            </p>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @if ($isOfficial)
                <a class="btn btn-outline-light mx-1" href="/{{$account_type}}/{{$token}}">
                    {{$switch_text}}</a>
            @endif
            @csrf
            <button type="submit" class="btn btn-outline-light mx-1">Odjavi se</button>
        </form>
    </div>
</nav>
