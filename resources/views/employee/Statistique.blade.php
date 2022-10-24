@extends('layouts.app')
@section('titre')
Statistique des employés
@endsection
@section('content')
<main class="mainn">
    <div class="card-header Stat">
        <h6 class="h6">Statistique</h6>
    </div>
    <div class="cards">
        <div class="card-single">
            <div>
                <h2>{{$mpiasa}}</h2>
                <small>Nombres des employés</small>
            </div>
            <div>
                <span class="fa-solid fa-user"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h2>5</h2>
                <small>Ville</small>
            </div>
            <div>
                <span class="fa fa-house"></span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <h2>{{$users}}</h2>
                <small>Administrateurs</small>
            </div>
            <div>
                <span class="fa-solid fa-user"></span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <h2>{{$fonction}}</h2>
                <small>Fonctions</small>
            </div>
            <div>
                <span class="fa fa-newspaper"></span>
            </div>
        </div>
      
    </div>
    <div class="composant">
        <div class="ventes">
            <div class="case">
                <div class="header-case">
                    <h2>Nombre des employé pour chaque fonction</h2>
                    {{-- <button class="buttonn">
                        Voir plus <span class="fa fa-arrow-right"></span>
                    </button> --}}
                </div><br>
                <div class="body-case">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Fonction</th>
                                <th scope="col">Effectif</th>
                                <th scope="col">Nom d'employé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($RoleAvecNrbEmployee as $Role)
                             <tr>
                                 <th>{{ $Role->Type_Role }}</th>
                                 <th> {{ $Role->employees_count}}</th>
                                 <th>
                                    @foreach ($Role->employees as $employee)
                                        {{ $employee->Nom}}
                                    @endforeach
                                 </th>
                             </tr>
                          
                           
                            {{-- {{  $Role->employees}} --}}
                          
                        @endforeach
                            <tr>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
                    
                  
                      
                </div>
            </div>
        </div>

    </div>


</main>

@endsection