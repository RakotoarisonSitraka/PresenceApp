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
    <div id="About">
       <div class="container">
          <div class="row">
             <div class="col">
                <div id="AboutData">
                   <div class="card bg-white">
                       <div class="card-title my-5">
                           <div class="media">
                              <img class="img-fluid rounded-top mx-5 d-none d-lg-block"
                               src="{{ asset('/storage/imageEmployee/' .$Presence->employee->Profil) }}" width="257"
                               height="250" alt="image">
                                 <div class="media-body bodyHeure">
                                    <h3 class="display-5 ml-5">{{$Presence->employee->Prenom}}</h3>
                                    <div class="container">
                                       <table class="table table-responsive ml-4">
                                         <tr>
                                           <td class="text-muted"><strong>Date</strong></td>
                                           <td>:</td>
                                           <td>{{$Presence->Date}}</td>
                                         </tr>
                                         <tr>
                                          <td class="text-muted"><strong>Heure d'entrée</strong></td>
                                          <td>:</td>
                                          <td>{{$Presence->Heure_Entree}}</td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted"><strong>Heure de sortie</strong></td>
                                          <td>:</td>
                                          <td>{{$Presence->Heure_Sortie}}</td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted"><strong>Total d'heure executé</strong></td>
                                          <td>:</td>
                                          <td>{{ $differenceHeure }} Heures</td>
                                        </tr>
                                       </table>
                                    </div>
                                  
                                 </div>
                               <center>
                                <a href="/Presence" class="btn btn-primary"></a>
                               </center>
                           </div>
                       </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
   {{-- <div>
    <div class=""><strong>Nom: </strong>{{$Presence->employee->Prenom}}</div>
    <h3>Fonction:{{ $Role->Type_Role}}</h3>
   </div>
    <table class="table tab MainPresence  infoHoraire">
       <thead>
         <tr>
          <th>
            <strong>
              <img class="ImgEmployee"
                  src="{{ asset('/storage/imageEmployee/' .$Presence->employee->Profil) }}" width="287"
                  height="210" alt="image">
             </strong>
          Nom: {{$Presence->employee->Prenom}}
          Fonction:{{ $Role->Type_Role}}
          </th>
          <th>
           {{$differenceHeure}}
          </th> --}}
          {{-- <th id="HoraireEmp">
            <center><i class="fa fa-clock listePresence"></i>Horaires d' employé</center>
          <th> --}}
        {{-- </tr>
        <tr>
           <th>Date</th>
           <th>Heure d'entrée</th>
           <th>Heure de sortie</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <th>{{$Presence->Date}}</th>
           <th>{{$Presence->Heure_Entree}}</th>
           <th>{{$Presence->Heure_Sortie}}</th>
         </tr>
       </tbody>
    </table>
    --}}


</main>
@endsection