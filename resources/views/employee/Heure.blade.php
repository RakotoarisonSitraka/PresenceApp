@extends('layouts.app')
@section('titre')
    Horaire
@endsection
@section('content')
<main class="mainn ">
    @if (session('status'))
      <div class="alert alert-success container" role="alert">
        {{ session('status') }}
      </div>
    @endif
    <strong>
      <img class="ImgEmployee presencePhoto"
          src="{{ asset('/storage/imageEmployee/' .$Presence->employee->Profil) }}" width="287"
          height="210" alt="image">
     </strong><br><br>
   <div>
    <div class="Photo">Photo</div>
    <option>{{ $Presence->employee->employee_id}}</option>
    {{-- <div>Fonction :{{$Presence->employee->role_id}}</div> --}}
   </div>
    {{-- <div class="infoEmployee">
       ff
    </div> --}}
    <table class="table tab MainPresence  infoHoraire">
       <thead>
         <tr>
          <th id="HoraireEmp">
            <center><i class="fa fa-list listePresence"></i>Horaires d' employé</center>
          <th>
        </tr>
        <tr>
           <th>Matricule</th>
           <th>Prénom </th>
           <th>Date</th>
           <th>Heure d'entrée</th>
           <th>Heure de sortie</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <th>{{$Presence->employee->id}}</th>
           <th>{{$Presence->employee->Prenom}}</th>
           <th>{{$Presence->Date}}</th>
           <th>{{$Presence->Heure_Entree}}</th>
           <th>{{$Presence->Heure_Sortie}}</th>
         </tr>
       </tbody>
    </table>
    {{-- <h1>{{ $Presence->Heure_Entree}}</h1>
    <h2>{{$Presence->Heure_Sortie}}</h2>
  <h1>{{$Presence->employee->Prenom}}</h1> --}}
               {{-- <form action="">
                <div class="body-case">
                    <div class="tableau">         
                       <table class="table tab MainPresence TabRole">            
                            <thead>
                                <tr>
                                    <th id="ListeRole">
                                        <center><i class="fa fa-list listePresence"></i>Liste des présences</center>
                                      
                                    </th>
                                </tr>                 
                                <tr>
                                   <th data-sortable="true" data-field="id">Date <i class=""></i></th>
                                   {{-- <th data-sortable="true" data-field="Nom">Heure d'Entrée</th>
                                   <th data-sortable="true" data-field="Nom">Heure de sortie</th>   --}}
                                   {{-- <th data-sortable="true" data-field="Prenom ">Prénom</th>  
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
                                        <strong><a href="{{ route('Heure')}}"
                                             class="btn btn-outline-primary container widthBtnRole">
                                              Horaire</a></strong>
                                      </th>     
                                      <th>
                                        <strong><button 
                                            type="button" class="btn btn-warning container widthBtnRole">
                                              Annuler</button></strong>
                                      </th>  
                                                   
                                 @endforeach
                                 @endif
                                     
    
                                               
                                         </tr>
                                    --}}
                               {{-- </tr>
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

    </div> --}} 


</main>
@endsection