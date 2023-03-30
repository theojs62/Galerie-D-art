<!DOCTYPE html>
<html lang="fr">
<head>
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarExample01"
                aria-controls="navbarExample01"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                        </li>
                    @else
                        <li class="nav-item" style="margin-top: .5rem;">
                            <strong>Bonjour {{ Auth::user()->name_user }}</strong>
                        </li>
                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('visitors.show', [Auth::user()->id]) }}">Mon compte</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a
                                class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                Déconnexion
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="p-5 text-center bg-light">
        <h1 class="mb-3">{{ config('app.name', 'Laravel') }}</h1>
        <h2 class="mb-3">@yield('title')</h2>
        <a class="btn btn-primary" href="{{ route('artworks.index') }}" role="button">Nos œuvres d'art</a>
    </div>
</header>
<br>
<br>
<br>
<main>
    <div class="align-content-center">
        @yield('main')
    </div>
</main>
@include('layouts.footer')
</body>
</html>
