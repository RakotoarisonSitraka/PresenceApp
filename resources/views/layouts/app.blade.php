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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.steps.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/main.js"></script>
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

    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('css/styleRegister.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Enregistrement.css') }}" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font/regular.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleNav.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/Enregistrement.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Styletotal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Presence.css') }}">
    <link rel="stylesheet" href="{{asset('css/StatistiqueCard.css')}}">
</head>

<body>
    <div id="app">
        @if (Auth::user())
            <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm navigation barnav" id="content">
                <div class="container">

                    {{-- contenu anle side bar --}}
                    <div class="content">
                        <div class="sidebar">
                            <span class="slide">
                                <a href="#" onclick="openSlideMenu()">
                                    {{-- <i class="fas fa-bars"></i> --}}
                                    <img class="sarii" src="{{asset('img/nogae.jpg')}}"
                                        alt="Image" >
                                </a>
                            </span>
                            <div id="menu" class="nav">
                                <a href="#" class="close" onclick="closeSlideMenu()">
                                    <i class="fas fa-times"></i>
                                </a>
                                <div class="sidebar-brand">
                                    <h2><span class="fa fa-user-O">Employes</span></h2>
                                </div>
                                <div class="sidebar-menu"> 
                                     {{-- fa fa-lis --}}
                                    <ul>
                                        <li><a href="/home" class="active"><span
                                            class="fa fa-list "></span><span>Liste des employes</span></a></li>      
                                        {{-- <li><a href="/home"><span class="fa fa-list"></span><span>Liste des employes</span></a>
                                        </li>  --}}
                                        {{-- <li><a href="#"><span class="fa fa-tasks"></span><span>Taches</span></a>
                                        </li> --}}
                                        {{-- <li><a href="#"><span
                                                    class="fa fa-registered"></span><span>Enregistrement</span></a></li> 
                                                     <li><a href="{{ url('Ajout-employee') }}" class="active"><span
                                            class="fa fa-registered "></span><span>Enregistrement</span></a></li>        
                                                    --}}
                                            <li><a href="{{ route('Presence')}}"><span
                                                        class="fa fa-list"></span><span>Liste des presences</span></a>
                                                        
                                            </li>
                                        <li><a href="{{ url('Ajout-employee') }}"><span
                                         class="fa fa-registered "></span><span>Enregistrement</span></a></li>   
                                         <li>
                                            {{-- <a class="" data-toggle="modal" data-target="#staticBackdrop"><span
                                            class="fa-solid fa-lines-leaning"></span><span>Domaines</span></a> --}}
                                            {{-- <div class="dropdown "> --}}
                                                <a class="btn btn-primary dropdown-toggle 
                                                     container RolesEmp"  id="dropdownMenu2" data-toggle="dropdown">
                                                     <span class="fa-solid fa-lines-leaning"></span>  Domaines <span class="caret IconRole"></span>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                  <li><button class="dropdown-item "  type="button"  data-toggle="modal" data-target="#staticBackdrop">Ajouter un domaine</button></li>
                                                  <li><a class="dropdown-item " id="hrefDomaine" href="{{route('ListeDesDomaines')}}" >Liste des domaines</a></li>
                                                
                                                </ul>
                                              {{-- </div> --}}
                                       </li>
                                        <li>
                                            
                                            <a href="{{ route('AjoutRole')}}" class="">
                                                <span class="fa fa-clipboard"></span> Fonctions <span class="caret IconRole"></span></a>
                                                {{-- <div class="dropdown-menu">
                                                    
                                                        <a class=""  id="" href="{{ route('AjoutRole')}}">
                                                            Ajouter
                                                        </a>
                                                </div> --}}
                                        </li>
                                        {{-- <li><a href=""><span
                                            class="fa-solid fa-user" ></span><span data-toggle="dropdown">Role</span></a>
                                            
                                        </li> --}}
                                        <li><a href="{{ route('Statistique') }}"><span
                                                    class="fa fa-line-chart"></span><span>Statistiques</span></a></li>

                                      

                                    </ul>
                                </div>
                            </div>
                           
                                  <form  action="{{route('Recherche')}}" method="GET" class="d-flex rech">
                                    <input class="form-control me-2" type="search" placeholder="Tapez le nom d'employes..." aria-label="" name="query">
                                    <button class="btn btn-outline-success" type="submit">Recherche</button>
                                  </form>
                                
                            {{-- <div class="search-wrapp">
                               {{-- fa fa-search --}}
                             {{--  <input type="search" name="search" placeholder="Recherche..">
                                <span  class=" btn btn-primary"><a  class="fa fa-search recherche"></a></span>
                               
                            </div> --}}
                        </div>
                        {{--  --}}

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
                    </div> --}}



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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto ">
                <!-- Authentication Links -->
                @if (Auth::user())
                    {{-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif --}}

                    @if (Route::has('register'))
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('register') }}">{{ __('Ajout') }}
                            </a>

                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle NavDroite" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end  Nave" aria-labelledby="navbarDropdown">
                            <center>
                                <Button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    Paramètre Profil <span class="caret"></span></Button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="btn btn-light container leftbar" href="{{ route('change-mdp') }}">
                                                {{ __('Mot de passe') }}
                                            </a>
                                        </li>
                                        <li class="leftbar">
                                            <button type="button" data-toggle="modal" data-target="#modif"
                                            class="btn btn-light container "> Information
                                            </button>
                                        </li>
                                    </ul><br><br>
                                    {{-- <a type="button" href="{{ route('ListeAdmin')}}"
                                    class="btn btn-outline-primary container">Administrateurs
                                </a><br><br> --}}

                                {{-- <a class="btn btn-light container">Parametre</a><br>
                                <a class="btn btn-primary container" href="{{ route('change-mdp') }}">
                                    {{ __('Mot de passe') }}
                                </a><br><br>
                                <button type="button" data-toggle="modal" data-target="#modif"
                                    class="btn btn-success container"> Profil
                                </button><br><br> --}}
                                <a class="btn btn-danger container" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Se deconnecter') }}
                                </a>
                            </center>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    <div class="modal fade" id="modif" tabindex="-1" role="dialog" aria-labelledby="ModifLabel"   data-keyboard="false"
    aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header modalEditUser">
                    <h4 class="modal-title">Modification d'information</h4>
                    <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close"></button>
                    {{-- <button class="btn btn-light" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div><br>

                {{-- <div class="modal-header">
        <h1>Suppression</h1> --}}
                @if (Auth::user())
                    <div class="modal-body">
                        <form action="{{ url('/modifier/' . Auth::user()->id) }}" method="POST">
                            @csrf
                            <div class="card-body ">
                                <input type="hidden" value="{{ Auth::user()->id }}">
                                <div class="row mb-3">
                                    {{-- <label for="Input" class="form-label">Nom
                                    </label> --}}
                                    <div class="col-md-19 modifUser Icon">
                                        <input name="name" type="" class="form-control IconFont"
                                            @error('name') is-invalid @enderror id="nameInput" placeholder="Saisissez votre nouvelle nom">
                                        <i class="fa-regular fa-user"></i>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><br>

                                <div class="row mb-3">
                                    {{-- <label for="emailInput" class="form-label">Nouvelle Email</label> --}}
                                    <div class="col-md-19 modifUser Icon">
                                        <input name="email" type="email" class="form-control IconFont"
                                            @error('email') is-invalid @enderror id="emailInput" placeholder="Saisissez votre  nouveau email">
                                        <i class="fa-solid fa-envelope"></i>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><br>
                                <center>
                                    <button class="btn btn-success  col-md-10">Modifier</button>
                                </center>
                              
                               <br><br><br>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajout d'un domaine</h5>
                   <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
         <div class="modal-body">
            <div class="modal-body">
                <form action="{{ route('InsertionDomaine') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nom du domaine:</label>
                    <input type="text" class="form-control" id="recipient-name" name="NomDomaine" 
                            @error('NomDomaine') is-invalid @enderror>
                            @error('NomDomaine')
                              <span
                                class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                  {{-- <div class="mb-3">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div> --}}
               
              </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Ajouter <i class="fa-sharp fa-solid fa-circle-plus"></i></button>
     </div>
    </form>
   </div>
</div>
</div>
    @yield('scripts')

</body>

</html>
