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
                               height="263" alt="image">
                                 <div class="media-body bodyHeure">
                                    <h3 class="display-5 ml-5">{{$Presence->employee->Prenom}}</h3>
                                    <div class="container">
                                       <table class="table table-responsive ml-4 tableHeure">
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
                                 <strong>
                                  <a href="/Presence" class="btn btn-primary">Retour
                                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                                  </a>
                                 </strong>
                               </center>
                           </div>
                       </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</main>
@endsection