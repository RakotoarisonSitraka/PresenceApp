@extends('layouts.app')
@section('titre')
Statistique des employés
@endsection
@section('content')
<main class="mainn " id="mainStat">
    {{-- <div class="card-header Stat">
        <h6 class="h6">Statistique</h6>
    </div> --}}
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
        {{-- <div class="card-single">
            <div>
                <h2>5</h2>
                <small>Ville</small>
            </div>
            <div>
                <span class="fa fa-house"></span>
            </div>
        </div> --}}

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
        <div class="card-single">
            <div>
                <h2>{{ $Domainess }}</h2>
                <small>Domaines</small>
            </div>
            <div>
                <span class="fa fa-newspaper"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h2>{{ $Projet }}</h2>
                <small>Projet</small>
            </div>
            <div>
                <span class="fa fa-newspaper"></span>
            </div>
        </div>
     
      
    </div>
    <div class="content-2">
        <div class="recent-payment">
             <div class="titles">
                <h4 class="h6stat">Effectif des employés par fonction</h4>
                <a href="#" class="btnbtn">Statistique</a>
             </div>
             <table class="tablestat">
               <thead>
                <tr>
                    <th>Fonction</th>
                    <th>Effectif</th>
                    <th>Nom des employés</th>
                </tr>
               </thead>
               <tbody>
                @foreach ($RoleAvecNrbEmployee as $Role)
                 <tr>
                     <td>{{ $Role->Type_Role }}</td>
                     <td><a id="aTdCountEmployees">{{ $Role->employees_count}}</a></td>
                     {{-- eto ilay formalisme dia hoe AnaranleTable_count--}}
                     {{-- <td>
                        @foreach ($Role->employees as $employee)
                            {{ $employee->Nom}}
                        @endforeach
                     </td> --}}
                     <td>
                        <li class=" dropright  btn btn-success">
                             <a href="" class="dropdown-toggle ahrefDropStat" data-toggle="dropdown">Voir les employés</a>
                             <div class="dropdown-menu cust-drop">
                                @foreach ($Role->employees as $employee)
                                   <a href="" class="dropdown-item ">{{ $employee->Nom}} {{$employee->Prenom}}</a>
                                @endforeach   
                             </div>
                        </li>
                    </td>
                 </tr>
              
               
                {{-- {{  $Role->employees}} --}}
              
            @endforeach
               
            </tbody>
             </table> 
           
            <div class="pagination-block homepagination statistiquePagination">
                {{ $RoleAvecNrbEmployee->links('layouts.paginationlinks') }}
            </div>
        
             
        </div>
        <div id="new-students">
          
                <div class="titles">
                   <h5>Liste</h5>
                   <a href="#" class="btnbtn">Domaines</a>
                </div>
                <table class="tablestat">
                    <thead>
                     <tr>
                         <th>Domaine</th>
                         <th>Nombre de projet</th>
                        
                     </tr>
                    </thead>
                    <tbody>
                     @foreach ( $DomaineAvecNbrProjet as $Domaine)
                      <tr>
                          <td>{{ $Domaine->NomDomaine }}</td>
                          <td><a>{{ $Domaine->projets_count}}</a></td>
                          {{-- <td><a class="btn btn-primary">admin</a></td> --}}
                      </tr>
                   
                    
                     {{-- {{  $Role->employees}} --}}
                   
                  @endforeach
                    
                 </tbody>
                  </table> 
                  
            <div class="pagination-block homepagination UserstatistiquePagination">
                {{ $DomaineAvecNbrProjet->links('layouts.paginationlinks') }}
            </div>
           
        </div>
    </div>
   
                </div><br>
               
                    
                  
                      
                </div>
            </div>
        </div>

    </div>
   


</main>

@endsection