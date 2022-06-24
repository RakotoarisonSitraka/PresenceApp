<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img\ima.jpg') }}">

    <title>@yield('titre')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.js') }}">
    {{-- open close sidebar --}}
    <script type="text/javascript">
        function openSlideMenu() {
            document.getElementById("menu").style.width = "300px";
            document.getElementById("content").style.marginLeft = "300px";
            /le distance an le izy mifanila miaraka amle tsipika refa open/  
        }

        function closeSlideMenu() {
            document.getElementById("menu").style.width = "0px";
            document.getElementById("content").style.marginLeft = "0px";
        }
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font/regular.min.css') }}">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div id="app">
        @if (Auth::user())
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navigation" id="content">
            <div class="container">
                
                {{-- contenu anle side bar --}}
                <div class="content">
                    <span class="slide">
                        <a href="#" onclick="openSlideMenu()">
                            <i class="fas fa-bars"></i>
                        </a>
                    </span>
                    
                    <div id="menu" class="nav">
                        <a href="#" class="close" onclick="closeSlideMenu()">
                            <i class="fas fa-times Icon"></i>
                        </a>
                        <div class="sidebar-brand">
                            <h2><span class="fa fa-user-O">Employe</span></h2>
                        </div>
                        <div class="sidebar-menu">
                            <ul>
                                <li><a href="#" class="active"><span
                                            class="fa fa-home"></span><span>Accueil</span></a></li>
                                <li><a href="#"><span class="fa fa-tasks"></span><span>Taches</span></a></li>
                                <li><a href="#"><span
                                            class="fa fa-line-chart"></span><span>Statistiques</span></a></li>
                                <li><a href="#"><span class="fa fa-clipboard"></span><span>Projet</span></a>
                                </li>
                                <li><a href="#"><span
                                            class="fa fa-registered"></span><span>Enregistrement</span></a></li>
                                <li><a href="#"><span class="fa fa-user"></span><span>Contact</span></a></li>

                            </ul>
                        </div> 
                        </div>
                        <div class="search-wrapp iconsearch">
                            <span class="fa fa-search"></span>
                            <input type="search"  class="form-control" name="" placeholder="Recherche..">
                        </div>
                    </div>

                </div>
                {{-- fin du contenu sidebar --}}
                    {{-- sidebar --}}
                    {{-- <div class="sidebar">
                        <span class="slide">
                            <a href="#" onclick="openSlideMenu()">
                                <i class="fas fa-bars"></i>
                            </a>
                        </span>
                        {{-- <div id="menu" class="nav">
                            <a href="#" onclick="closeSlideMenu()">
                                <i class="fas fa-times"></i>
                            </a>
                        </div> --}}
                        {{-- refa misokatra --}}
                        {{-- <div id="menu" class="nav">
                            <a href="#" onclick="closeSlideMenu()">
                                <i class="fas fa-times"></i>
                            </a>

                            <div class="sidebar-brand">
                                <h2><span class="fa fa-user-O">Employe</span></h2>
                            </div>
                            <div class="sidebar-menu">
                                <ul>
                                    <li><a href="#" class="active"><span
                                                class="fa fa-home"></span><span>Accueil</span></a></li>
                                    <li><a href="#"><span class="fa fa-tasks"></span><span>Taches</span></a></li>
                                    <li><a href="#"><span
                                                class="fa fa-line-chart"></span><span>Statistiques</span></a></li>
                                    <li><a href="#"><span class="fa fa-clipboard"></span><span>Projet</span></a>
                                    </li>
                                    <li><a href="#"><span
                                                class="fa fa-registered"></span><span>Enregistrement</span></a></li>
                                    <li><a href="#"><span class="fa fa-user"></span><span>Contact</span></a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="search-wrapp">
                            <span class="fa fa-search"></span>
                            <input type="search" name="" placeholder="Recherche..">
                        </div>
                    </div>  --}}



                    {{-- <img class="row g-1" src="{{ asset('img\ima.jpg') }}" alt="" width="126px"
                        height="67px" id="img"> --}}
                    {{-- <form class="row g-1">
                        <div class="col-auto">
                            <input type="text" class="form-control" id="" placeholder="Rechercher...">
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary mb-3 container">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>

                        </div>
                    </form> --}}
                @endif

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
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Ajout') }}
                                    </a>

                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <center>
                                        <a class="btn btn-light container">Parametre</a><br>
                                        <a class="btn btn-primary container" href="{{ route('change-mdp') }}">
                                            {{ __('Mot de passe') }}
                                        </a><br><br>
                                        <button type="button" data-toggle="modal" data-target="#modif"
                                            class="btn btn-success container"> Profil
                                        </button><br><br>
                                        <a class="btn btn-warning container" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Se deconnecter') }}
                                        </a>
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
    <img class="row g-1" src="{{ asset('img\nogae.jpg') }}" alt="" width="126px"
    height="" id="img">
    @yield('scripts')

</body>

</html>
