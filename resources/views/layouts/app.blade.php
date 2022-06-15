<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titre')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.js') }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @if (Auth::user())
                            {{-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif --}}

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <center>
                                        <a class="dropdown-item">Parametre</a>
                                        <a class="btn btn-primary" href="{{ route('change-mdp') }}">
                                            {{ __('edit password') }}
                                        </a><br><br>
                                        <a class="btn btn-warning" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a><br><br>
                                        <button type="button" data-toggle="modal" data-target="#modif"
                                            class="btn btn-success">Modifier Profil
                                        </button>
                                    </center>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="modal fade" id="modif" tabindex="-1" role="dialog" aria-labelledby="ModifLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modification Profil</h4>
                        <button class="btn btn-light" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-warning" role="alert">
                {{ session('error') }}
            </div>
        @endif
                    {{-- <div class="modal-header">
        <h1>Suppression</h1> --}}

                    @if (Auth::user())
                        <div class="modal-body">
                            <form action="{{ url('/modifier/' . Auth::user()->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" value="{{ Auth::user()->id }}">
                                    <div class="mb-3">
                                        <label for="emailInput" class="form-label">Nouvelle Email</label>
                                        <input name="email" type="email" class="form-control"
                                            @error('email') is-invalid @enderror id="emailInput">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="Input" class="form-label">Nom

                                        </label>
                                        <input name="name" type="text" class="form-control"
                                            @error('name') is-invalid @enderror id="nameInput">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success">Modifier</button>
                                    </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @yield('scripts')
</body>

</html>
