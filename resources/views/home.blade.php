@extends('layouts.app')
@section('titre')
    Page d'accueil
@endsection
@section('content')
    <div class="container vatana home cont ">
        {{-- LE ContainerListeEmployes io no mitondra an le header miaraka am le tableau rehetra --}}
        <div class="row justify-content-center ContainerListeEmployes">
            <div class="col-md-20 ">
                <div class="card-header">
                    <h6 class="h6">Liste des Employés <a href="" class="fa fa-list fontAdd "></a></h6>
                </div>
                <div>
                </div>
                <div class="scroll">
                    <table class="table tab">
                        @if (session('status'))
                            <div class="alert alert-success container" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <tr class="">
                            <td class="table-light" id="td"><strong>
                                    <h5 class=" matric" id="td">Matricule</h5>
                                </strong></td>
                            <td class="table-info " id="td"><strong>
                                    <h5 class="titre">Nom</h5>
                                </strong></td>
                            <td class="table-success " id="td"><strong>
                                    <h5 class="titre">Prenom</h5>
                                </strong></td>
                            <td class="table-primary " id="td"><strong>
                                    <h5 class="titre">Email</h5>
                                </strong></td>
                            {{-- <td class=" table-info" id="td"><strong>
                                    <h5 class="titre">Telephone</h5>
                                </strong></td> --}}
                            {{-- <td class=" " id="td"><strong>
                               <h5 class="titre">Role</h5>
                                </strong></td> --}}
                            <td class="table-success " id="td"><strong>
                                    <h5 class="titre">Photo</h5>
                                </strong></td>
                            <td id="td"><strong>
                                    <h5 class="titre">
                                        <center>Options</center>
                                    </h5>
                                </strong></td>
                            <td></td>
                            <td></td>
                        </tr>                     
                        @if (is_countable($Employes) && count($Employes) != 0)
                            @foreach ($Employes as $staff)
                                <tr class="">
                                    <td class="table-warning" id="td"><strong>{{ $staff->id }}</strong></td>
                                    <td class="" id="td tde"><strong>{{ $staff->Nom }}</strong></td>
                                    <td class="" id="td"><strong>{{ $staff->Prenom }}</strong></td>
                                    <td class="" id="td"><strong>{{ $staff->Email }}</strong></td>
                                    {{-- <td class="" id="td"><strong>{{ $staff->Telephone }}</strong></td> --}}
                                    
                                    {{-- <td class="" id="td"><strong>{{ $staff->role->Type_Role}}</strong></td> --}}
                                    {{-- <td class="" id="td"><strong>{{  }}</strong></td> --}}
                                    {{-- <img src="{{ url('/uploads/cat_banner_img/'.$cat->cat_banner) }}" width="110" height="40" /> --}}
                                    <td class="" id="td">
                                        <strong>
                                            <img class="ImgEmployee"
                                                src="{{ asset('/storage/imageEmployee/' . $staff->Profil) }}" width="97"
                                                height="78" alt="image">

                                        </strong>
                                    </td>
                                    {{-- data-toggle="modal" data-target="#Supprim" --}}
                                    <td><strong><button data-toggle="modal" data-target="{{ '#Details' . $staff->id }}"
                                        type="button" class="btn btn-outline-info container">
                                        <i class="fa-solid fa"></i>Details</button></strong>

                                         {{-- modal Details --}}
                                    <div class="modal fade" id="{{ 'Details' . $staff->id }}" tabindex="-1"
                                        aria-labelledby="DetailsLabel" aria-hidden="true" data-backdrop="static"
                                        data-keyboard="false">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header DetailsEmploye">
                                                    <h5 class="modal-title" id="DetailsLabel"><strong>Détails 
                                                            d'Employé</strong></h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <center>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            {{-- <label for="{{ 'formFileDisabled' . $staff->id }}"
                                                                class="TypeFile form-group">Photo
                                                                selectionnée</label> --}}
                                                            {{-- <input class="form-control" name="Sary"
                                                                type="file"
                                                                id="{{ 'formFileDisabled' . $staff->id }}" --}}
                                                                {{-- @error('Sary') is-invalid @enderror> --}}
                                                            <img src="{{ asset('storage/ImageEmployee/' . $staff->Profil) }}"
                                                                alt="Image" width="120px" height="70px">
                                                        </div>
                                                </center>
                                                       
                                                        {{-- <input type="hidden" value="{{ $staff->id }}"> --}}
                                                       <center>
                                                        <h5><strong>Matricule:</strong> {{ $staff->id }}</h5><br>
                                                        <div class="row GaucheDetails">
                                                            <div class="col ">
                                                                <div class="form-group">
                                                                    <label for="Nom"
                                                                        class="textLabel"><strong>Nom:</strong> {{ $staff->Nom }}</label>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="Prenom"
                                                                        class="textLabel"><strong>Prénom:</strong> {{ $staff->Prenom }}</label>
                                                            
                                                                </div>
                                                        </div><br><br><br>
                                                    
                                                           <div class="row GaucheDetails">
                                                            <div class="col">
                                                                <div class="form-group container">
                                                                    <label for="Email" class="textLabel"><strong>Email:</strong> {{ $staff->Email }}</label>
                                                                   
                                                                </div>
                                                            </div>
                                                               
                                                                <div class="col">
                                                                    <div class="form-group ">
                                                                        <label for="Age"
                                                                            class="textLabel"><strong>Age:</strong> {{ $staff->Age }}</label>
                                                                       
                                                                    </div><br>
    
                                                                </div>
                                                           </div>
                                                          
                                                           <div class="row GaucheDetails">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="telephone" id="telephoneDetails"
                                                                        class="textLabel "><strong>Telephone:</strong>{{ $staff->Telephone }}</label>
                                                
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="cin"
                                                                        class="textLabel"><strong>CIN:</strong> {{ $staff->CIN }}</label>
                                                                
                                                                </div>
                                                            </div><br><br>
                                                           </div><br><br><br>

                            
                                                            <div class="col GaucheDetails">
                                                                <div class="form-group ">
                                                                    <label for="Adresse"
                                                                        class="textLabel">Adresse: {{ $staff->Addresse }}</label>
                                                                   
                                                                </div>
                                                            </div><br><br>
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="Adresse"
                                                                        class="textLabel">Sexe:{{$staff->Sexe}}</label>
                                                                   
                                                                </div>
                                                            </div><br>
                                                        </div><br>
                                                       <div class="row GaucheDetails">
                                                        <div class="col">
                                                            <div class="form-group ">
                                                                  <label for="Ville">Ville d'Origine:{{ $staff->Ville}}</label>
                                                               
                                                            </div>
                                                        </div><br>
                                                        <div class="col">
                                                            <div class="form-group ">
                                                                <label for="Position">Fonction: {{ $staff->role->Type_Role}}</label>
                                                               
                                                            </div>
                                                        </div>
                                                       </div><br><br>
                                                    </div>
                                                        {{-- <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="Ville">Ville d'Origine:{{ $staff->Ville}}</label>
                                                
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                   
                                                                    <label for="Position">Fonction: {{ $staff->role->Type_Role}}</label>
                                                                </div>
                                                            </div>
                                                           </div>   --}}
                                        
                                                               
                                                            
                                                                  
                                                             
                                                      </div><br>
                                                        </div><br>
                                                       
                                                </div>
                                                       </center>
                                            </div>
                                        </div>
                                    </div>
                                    </td>

                                        <td><strong><button type="button" data-toggle="modal"
                                            data-target="{{ '#Modifier' . $staff->id }}"
                                            class="btn btn-success container">
                                            <i class="fa-solid fa-file-pen"></i></button></strong>

                                    {{-- modal modification --}}
                                    <div class="modal fade" id="{{ 'Modifier' . $staff->id }}" tabindex="-1"
                                        aria-labelledby="ModifierLabel" aria-hidden="true" data-backdrop="static"
                                        data-keyboard="false">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header ModifEmployes">
                                                    <h5 class="modal-title" id="ModifierLabel"><strong>Modification
                                                            d'Employé</strong></h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/modifierEmployee/' . $staff->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h5>Matricule: {{ $staff->id }}</h5>
                                                        {{-- <input type="hidden" value="{{ $staff->id }}"> --}}
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="Nom"
                                                                        class="textLabel">Nom</label>
                                                                    <input type="text" name="Anarana"
                                                                        class="form-control "
                                                                        value="{{ $staff->Nom }}"
                                                                        @error('Anarana') is-invalid @enderror>
                                                                    @error('Anarana')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="Prenom"
                                                                        class="textLabel">Prénom</label>
                                                                    <input type="text" name="Fanampiny"
                                                                        class="form-control"
                                                                        value="{{ $staff->Prenom }}"@error('Fanampiny') is-invalid @enderror>
                                                                    @error('Fanampiny')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div><br><br><br>
                                                            <div class="form-group container">
                                                                <label for="Email" class="textLabel">Email</label>
                                                                <input type="email" name="Mailaka"
                                                                    class="form-control"
                                                                    value="{{ $staff->Email }}"@error('Mailaka') is-invalid @enderror>
                                                                @error('Mailaka')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div><br><br><br><br>

                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="Age"
                                                                        class="textLabel">Age</label>
                                                                    <input type="number" name="Age"
                                                                        class="form-control"value="{{ $staff->Age }}"@error('Age') is-invalid @enderror>
                                                                    @error('Age')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div><br>

                                                            </div>

                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="telephone"
                                                                        class="textLabel">Telephone</label>
                                                                    <input type="number" name="Laharana"
                                                                        class="form-control"
                                                                        value="{{ $staff->Telephone }}"
                                                                        @error('Laharana') is-invalid @enderror>
                                                                    @error('Laharana')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="cin"
                                                                        class="textLabel">CIN</label>
                                                                    <input type="text" name="CIN"
                                                                        class="form-control"
                                                                        value="{{ $staff->CIN }}"
                                                                        @error('CIN') is-invalid @enderror>
                                                                    @error('CIN')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="Adresse"
                                                                        class="textLabel">Adresse</label>
                                                                    <input type="text" name="Adresse"
                                                                        class="form-control"
                                                                        value="{{ $staff->Addresse }}"@error('Adresse') is-invalid @enderror>
                                                                    @error('Adresse')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <center>
                                                                <div class="mb-3">
                                                                    <label for="{{ 'formFileDisabled' . $staff->id }}"
                                                                        class="TypeFile form-group">Photo
                                                                        selectionnée</label>
                                                                    <input class="form-control" name="Sary"
                                                                        type="file"
                                                                        id="{{ 'formFileDisabled' . $staff->id }}"
                                                                        @error('Sary') is-invalid @enderror>
                                                                    <img src="{{ asset('storage/ImageEmployee/' . $staff->Profil) }}"
                                                                        alt="Image" width="70px" height="70px">
                                                                </div>
                                                            </center>
                                                            <div class="col">
                                                                <label for="Sexe">Sexe</label>
                                                                <div class="form-group">
                                                                    <select class="form-select"aria-label=""
                                                                        name="Sexe">

                                                                        <option value="Homme">Homme</option>
                                                                        <option value="Femme">Femme</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <label for="Ville">Ville d'Origine</label>
                                                                <div class="form-group">
                                                                    <select class="form-select" aria-label=""
                                                                        name="Ville">
                                                                        <option value="Antananarivo">Antananarivo
                                                                        </option>
                                                                        <option value="Antsirabe">Antsirabe</option>
                                                                        <option value="Fianarantsoa">Fianarantsoa
                                                                        </option>
                                                                        <option value="Toliary">Toliary</option>
                                                                        <option value="Antsiranana">Antsiranana
                                                                        </option>
                                                                        <option value="Mahajanga">Mahajanga</option>
                                                                        <option value="Toamasina">Toamasina</option>
                                                                    </select>
                                                                </div>
                                                            </div><br>
                                                            <div class="col">
                                                                <label for="Position">Fonction</label>
                                                                <div class="form-group">

                                                                    <select class="form-select" aria-label=""
                                                                        name="role">
                                                                        <option selected><strong>--Fonction--</strong>
                                                                        </option>
                                                                        {{-- <option value="">{{$staff->roles->Type_Role}}</option> --}}
                                                                       {{-- <option value="">{{$}}</option> --}}
                                                                        @foreach ($roles as $anjara)
                                                                            <option value="{{ $anjara->id }}">
                                                                                {{ $anjara->Type_Role }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                            </div><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Fermer</button>
                                                            <button type="submit"
                                                                class="btn btn-success">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                                <td><strong><button type="button" data-toggle="modal"
                                    data-target="{{ '#Presence' . $staff->id }}"
                                    class="btn btn-primary container">
                                    <i class="fa-regular fa-file-powerpoint contai"></i></button></strong>
                            {{-- Fin PRESENCE --}}
                            <div class="modal fade " id="{{ 'Presence' . $staff->id }}" tabindex="-1"
                                aria-labelledby="PresenceLabel" aria-hidden="true" data-backdrop="static"
                                data-keyboard="false">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">
                                        <div class="modal-header modalPresence">
                                            <h5 class="modal-title" id=""><strong>Présence d'
                                                    Employé</strong></h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $staff->Prenom }}
                                            <form action="{{ route('SauverPresence') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="employeeId" value="{{ $staff->id }}">
                                                {{-- @foreach ($roles as $anjara)
                                                <option value="{{ $anjara->id }}">{{ $anjara->Type_Role}}</option>
                                            @endforeach --}}
                                                {{-- Prenom:<input class="form-control" value="" 
                                                name="NomEmployeePresence"> --}}
                                                <center> Assiduité :</center><select class="form-select md-6"
                                                    aria-label="" name="Dynamisme">
                                                    {{-- <option value="Absent"selected>Absent</option> --}}
                                                    <option value="Present">Present</option>
                                                </select><br>
                                                <div class="row form-group">
                                                    <label for="date" class="col-sm-3 ">Date
                                                        d'Aujourd'hui</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group date" id="datepicker">
                                                            <input type="date" class="form-control"
                                                            name="Date"   @error('Date') is-invalid @enderror>
                                                            @error('Date')
                                                              <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row form-group">
                                                    <label for="time" class="col-sm-3 ">Heure
                                                        d'entrée</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group date" id="datepicker">
                                                            <input type="Time" class="form-control"
                                                                min="00:00"    name="HeureEntre"  
                                                             @error('HeureEntre') is-invalid @enderror>
                                                             @error('HeureEntre')
                                                               <span class="text-danger">{{ $message }}</span>
                                                             @enderror
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row form-group">
                                                    <label for="date" class="col-sm-3 ">Heure de
                                                        sortie</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group date" id="datepicker">
                                                            <input type="Time" class="form-control"
                                                                min="00:00"  name="HeureSortie"  
                                                                @error('HeureSortie') is-invalid @enderror>
                                                                @error('HeureSortie')
                                                                  <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                              </div><br><br><br>

                                           <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                           </div><br>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- modal PRESENCE --}}

                        </td>


                                    <td><strong><button data-toggle="modal" data-target="{{ '#Supprim' . $staff->id }}"
                                                type="button" class="btn btn-danger container">
                                                <i class="fa-solid fa-trash"></i></button></strong>
                                        {{-- modal suppression --}}
                                        <div class="modal fade" id="{{ 'Supprim' . $staff->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="SuppLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1><strong>Suppression</strong></h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez vous Supprimer cette employé??
                                                    </div>
                                                    <div class="modal-footer">

                                                        <a class="btn btn-danger"
                                                            href="/Supprimer/{{ $staff->id }}">Oui</a>

                                                        {{-- <a class="btn btn-danger" href="/Supprimer/{{$staff->id}}">Oui</a> --}}

                                                        <button type="button" class="btn btn-warning"
                                                            data-dismiss="modal">Non</button>
                                                    </div>
                                                </div>
                                                {{-- fin --}}

                                            </div>
                                        </div>
                                    </td>
                                  
                                  




                                </tr>
                            @endforeach
                        @endif
                    </table>
                    <div class="pagination-block homepagination">
                        {{ $Employes->links('layouts.paginationlinks') }}
                    </div>
                </div>
            </div>
        </div>

        {{-- fin --}}





        {{-- {{-- <div class="container home">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Accueil') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <table class="table">
                        <tr class="table-primary">
                            <td><strong>
                                <h5>Id</h5>
                            </strong></td>
                        <td class="table-info"><strong>
                                <h5>Nom</h5>
                            </strong></td>
                        <td class="table-success"><strong>
                                <h5>Prenom</h5>
                            </strong></td>
                        <td class="table-primary"><strong>
                            <h5>Email</h5>
                        </strong></td>
                        <td class="table-info"><strong>
                            <h5>Telephone</h5>
                        </strong></td>  
                        <td class="table-success"><strong>
                            <h5>Photo</h5>
                        </strong></td>              
                        <td><strong>
                                <h5>
                                    <center>Options</center>
                                </h5>
                            </strong></td>
                        <td></td>
                        </tr>
                        @if (is_countable($Employes) && count($Employes) != 0)
                        @foreach ($Employes as $staff)
                            <tr class="">
                                <td class="table-warning"><strong>{{ $staff->id }}</strong></td>
                                <td class="table-danger"><strong>{{ $staff->Nom }}</strong></td>
                                <td class="table-info"><strong>{{ $staff->Prenom }}</strong></td>
                                <td class="table-primary"><strong>{{$staff->Email}}</strong></td>
                                <td class="table-success"><strong>{{$staff->Telephone}}</strong></td>
                                <td class="table-info"><strong>{{$staff->Photo}}</strong></td>
                                <td><strong><button type="button" data-toggle="modal" data-target="#Supprim"
                                            class="btn btn-danger container">
                                            <i class="fa-solid fa-trash"></i></button></strong>
                                </td>
                        @endforeach
                        </tr>
                    @endif --}}

        {{-- Debut modal suppUser --}}
        {{-- <div class="modal fade" id="Supprim" tabindex="-1" role="dialog" aria-labelledby="SuppLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                        <h1>Suppression</h1> --}}
        {{-- <div class="modal-body">
                                        Voulez vous vraiment supprimer cette administrateur?
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Oui</button>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Non</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    @endsection
