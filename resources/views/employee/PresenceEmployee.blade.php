@extends('layouts.app')
@section('titre')
    Présence des employés
@endsection
@section('content')
    <main class="mainn ">
        @if (session('status'))
          <div class="alert alert-success container" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div class="card-header Stat">
            <h6 class="h6">Liste</h6>
        </div>
        <div class="cards">
           
            <div class="card-single CardSing">
                <div>
                    <h2>50</h2>
                    <small>Nombres des employés</small>
                </div>
                <div>
                    <span class="fa-solid fa-user"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h2>5</h2>
                    <small>Section</small>
                </div>
                <div>
                    <span class="fa fa-house"></span>
                </div>
            </div>
{{-- 
            <div class="card-single">
                <div>
                    <h2>8</h2>
                    <small>Fournisseur</small>
                </div>
                <div>
                    <span class=""></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h2>6</h2>
                    <small>Roles</small>
                </div>
                <div>
                    <span class="fa fa-newspaper"></span>
                </div>
            </div> --}}
          
        </div>
        <div class="composant">
            <form  action="" method="" class="d-flex rech">
                <input class="form-control" id="InputPresence" type="search" placeholder="Recherche..." aria-label="" name="">
                <button class="btn btn-outline-warning " type="submit">Recherche</button>
            </form><br><br>
            <div class="ventes">
                <div class="case">
                    <div class="header-case">
                        {{-- <button class="buttonn">
                            Voir plus <span class="fa fa-arrow-right"></span>
                        </button> --}}
                    </div>
                  
                    <div class="body-case">
                        <div class="tableau">
                            <table class="table tab MainPresence">
                                <thead>
                                    <tr>
                                       <th data-sortable="true" data-field="id">Date</th>
                                       {{-- <th data-sortable="true" data-field="Nom">Heure d'Entrée</th>
                                       <th data-sortable="true" data-field="Nom">Heure de sortie</th>   --}}
                                       <th data-sortable="true" data-field="Prenom ">Prénom</th>  
                                       <th data-sortable="true" data-field="Assiduité ">Assiduité</th>  
                                       <th data-sortable="true" data-field="Option">Option</th>               
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if (is_countable($Presence) && count($Presence) != 0)
                                    @foreach ($Presence as $Donnes)
                                    <tr>
                                      <th>{{$Donnes->Date}}</th>
                                     <th>
                                       {{$Donnes->employee->Prenom}}
                                     </th>
                                    
                                      <th>{{$Donnes->Options}}</th>
                                      <th><strong><button 
                                        type="submit" class="btn btn-success container widthBtnRole">
                                          Voir Plus</button></strong></th>
                                     
                                     @endforeach
                                     @endif
                                            
                                                   </th>
                                                   
                                             </tr>
                                       
                                   </tr>
                                  </tbody>
                            </table>
                            <div class="pagination-block homepagination">
                                {{ $Presence->links('layouts.paginationlinks') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>
@endsection
