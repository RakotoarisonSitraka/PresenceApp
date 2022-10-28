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
        {{-- <div class="card-header Stat">
            <h6 class="h6">Liste</h6>
        </div> --}}
        <div class="cards">
           
            {{-- <div class="card-single CardSing">
                <div>
                    <h2>50</h2>
                    <small>Nombres des employés</small>
                </div>
                <div>
                    <span class="fa-solid fa-user"></span>
                </div>
            </div>--}}
            <div class="card-single CardRole">
                <div>
                    <h2>{{$NbrPresent}}</h2>
                    <small>Présents Aujourd'hui</small>
                </div>
                <div>
                    <span class="fa fa-house"></span>
                </div>
            </div>           
        </div>
        <div class="composant">
            <form  action="{{route('RechercheDate')}}" method="GET" class="d-flex rech">
                <input type="date" class="form-control" name="SearchDate" id="InputPresence" aria-label="">
                <button class="btn btn-outline-warning " type="submit">Chercher</button>
            </form><br><br>
            <div class="ventes">
                <div class="case">
                    <div class="header-case">
                        {{-- <button class="buttonn">
                            Voir plus <span class="fa fa-arrow-right"></span>
                        </button> --}}
                    </div>
                   <form action="">
                    <div class="body-case">
                        <div class="tableau">         
                           <table class="table tab MainPresence TabRole">            
                                <thead>
                                    <tr>
                                        <th id="ListeRole">
                                            {{-- <i class="fa-solid fa-timer"></i> --}}
                                            <center><i class="fa fa-list listePresence"></i>Liste des présences</center>
                                          
                                        </th>
                                    </tr>                 
                                    <tr>
                                       <th data-sortable="true" data-field="id">Date <i class=""></i></th>
                                       {{-- <th data-sortable="true" data-field="Nom">Heure d'Entrée</th>
                                       <th data-sortable="true" data-field="Nom">Heure de sortie</th>   --}}
                                       <th data-sortable="true" data-field="Prenom ">Prénom</th>  
                                       <th data-sortable="true" data-field="Assiduité ">Assiduité</th>  
                                       <th data-sortable="true" data-field="Option"><center>Option</center></th>               
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
                                        type="button" class="btn btn-success container widthBtnRole">
                                          Actif</button></strong></th>
                                          <th>
                                            <strong><a href="{{ url('/Heure/' . $Donnes->id) }}"
                                                 class="btn btn-outline-primary container widthBtnRole">
                                                  Horaire</a></strong>
                                          </th>     
                                          <th>
                                            <strong><button  data-target="{{ '#AnnulerPresence' . $Donnes->id }}"
                                             data-toggle="modal"    type="button" class="btn btn-warning container widthBtnRole">
                                                  Annuler <i class="fa-solid fa-xmark annulerBtnPrsence"></i></button></strong>
                                                 {{-- modal suppression --}}
                                        <div class="modal fade" id="{{ 'AnnulerPresence' . $Donnes->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="AnnulerLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    {{-- <div class="modal-header">
                                                        <h1><strong></strong></h1>
                                                    </div> --}}
                                                    <div class="modal-body">
                                                        Voulez vous vraiment annuler la présence de cette employé??
                                                    </div>
                                                    <div class="modal-footer">

                                                        <a class="btn btn-danger"
                                                            href="/AnnulerPresence/{{ $Donnes->id }}">Oui</a>

                                                        {{-- <a class="btn btn-danger" href="/Supprimer/{{$staff->id}}">Oui</a> --}}

                                                        <button type="button" class="btn btn-warning"
                                                            data-dismiss="modal">Non</button>
                                                    </div>
                                                </div>
                                                {{-- fin --}}
                                          </th>  
                                          {{-- <th>ss</th> --}}
                                                       
                                     @endforeach
                                     @endif
                                         
        
                                                   
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
                   </form>
                   
            </div>

        </div>


    </main>
@endsection
