@extends('layouts.app')
@section('titre')
    Details d'employé
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
                              <img class="img-fluid rounded-top mx-5 d-none d-lg-block imageHeure"
                               src="{{ asset('/storage/imageEmployee/' . $DetailsEmployee->Profil) }}" width="257"
                               height="" alt="image">
                                 <div class="media-body bodyHeure">
                                    <h3 class="display-5 ml-5"></h3>
                                    <div class="container">
                                     
                                       <table class="table table-responsive ml-4 tableHeure" id="tableheur">
                                        <tr>
                                           <td class="text-muted"><strong>Nom</strong></td>
                                           <td>:</td>
                                           <td>{{$DetailsEmployee->Nom}}</td>
                                          {{-- @if ($Role->count())
                                          <td>{{ $Role->Type_Role}}</td>
                                          @else
                                          <td></td>
                                          @endif --}}
                                        
                                        
              
                              
                                        </tr>
                                         <tr>
                                           <td class="text-muted"><strong>Prenom</strong></td>
                                           <td>:</td>
                                           <td>{{$DetailsEmployee->Prenom}}</td>
                                         </tr>
                                         <tr>
                                          <td class="text-muted"><strong>Email</strong></td>
                                          <td>:</td>
                                          <td>{{$DetailsEmployee->Email}}</td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted"><strong>Téléphone</strong></td>
                                          <td>:</td>
                                          <td>{{$DetailsEmployee->Telephone}}</td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted"><strong>Adresse</strong></td>
                                          <td>:</td>
                                          <td>{{$DetailsEmployee->Addresse}}</td>
                                        </tr>
                                        <tr>
                                          <td class="text-muted"><strong>Age</strong></td>
                                          <td>:</td>
                                          <td>{{$DetailsEmployee->Age}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted"><strong>Ville</strong></td>
                                            <td>:</td>
                                            <td>{{$DetailsEmployee->Ville}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted"><strong>Sexe</strong></td>
                                            <td>:</td>
                                            <td>{{$DetailsEmployee->Sexe}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted"><strong>CIN</strong></td>
                                            <td>:</td>
                                            <td>{{$DetailsEmployee->CIN}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted"><strong>Date d'embauche</strong></td>
                                            <td>:</td>
                                            <td>{{$DetailsEmployee->DateEntree}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted"><strong>Fonction </strong>:</td>
                                            <td>:</td>
                                          @if ($role)
                                          <td>{{$role->Type_Role}}</td>
                                          @else
                                          <td>Fonction retiré</td>
                                          @endif
                                            {{-- <td>Developpeur web</td> --}}
                                        </tr>
                                        <tr>
                                            <td class="text-muted"><strong>Domaine</strong></td>
                                            <td>:</td>
                                            @if ($Domaine)
                                                <td>{{ $Domaine->NomDomaine}}</td>
                                            @endif
                                        </tr>
                                        
                                       </table>
                                    </div>
                                  
                                 </div><br>
                               
                                 <strong>
                                  <a href="/home" class="btn btn-primary btyy">Retour
                                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                                  </a>
                                 </strong><br><br>
                                 <a class="btnbtn " id="gg">Details</a>
                               
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