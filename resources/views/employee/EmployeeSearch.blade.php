@extends('layouts.app')
@section('titre')
    Resultat du recherche
@endsection
@section('content')
    <br>
    <br>
    <br>
    @if (isset($resultat))
    <center><h3 class="hh2">Resultats de recherche des employés</h3></center>
        <div class="scroll recherche">
            <center>
               
            </center><br>
            <table class="table table-striped table-hover container">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <thead>
                    <tr>
                        {{-- <th scope="col">ID</th> --}}
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Matricule</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @if (is_countable($resultat) && count($resultat) != 0)
                        @foreach ($resultat as $valiny)
                            <tr>
                                {{-- <td>{{ $valiny->id}}</td> --}}
                                <td>{{ $valiny->Nom }}</td>
                                <td>{{ $valiny->Prenom }}</td>
                                <td>{{ $valiny->id }}</td>
                                <td> <strong>
                                        <img class="ImgEmployee"
                                            src="{{ asset('/storage/imageEmployee/' . $valiny->Profil) }}" width="87"
                                            height="78" alt="image">

                                    </strong></td>
                                <td>
                                    <button data-toggle="modal" data-target="{{ '#Supprim' . $valiny->id }}" type="button"
                                        class="btn btn-danger container">
                                        <i class="fa-solid fa-trash"></i></button></strong>

                                         {{-- modal suppression --}}
                                         <div class="modal fade" id="{{ 'Supprim' . $valiny->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="SuppLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1><strong>Suppression</strong></h1>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez vous Supprimer cette employée??
                                                    </div>
                                                    <div class="modal-footer">

                                                        <a class="btn btn-danger"
                                                            href="/Supprimer/{{ $valiny->id }}">Oui</a>

                                                        {{-- <a class="btn btn-danger" href="/Supprimer/{{$staff->id}}">Oui</a> --}}

                                                        <button type="button" class="btn btn-warning"
                                                            data-dismiss="modal">Non</button>
                                                    </div>
                                                </div>
                                                {{-- fin --}}
                                </td>
                                <td>
                                    <strong><button type="button" data-toggle="modal" data-target="{{ '#Modifier' . $valiny->id }}"
                                            class="btn btn-success container">
                                            <i class="fa-solid fa-file-pen"></i></button></strong>

                                              {{-- modal modification --}}
                                    <div class="modal fade" id="{{ 'Modifier' . $valiny->id }}" tabindex="-1"
                                        aria-labelledby="ModifierLabel" aria-hidden="true" data-backdrop="static"
                                        data-keyboard="false">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header ModifEmploye">
                                                    <h5 class="modal-title" id="ModifierLabel"><strong>Modification
                                                            d'Employée</strong></h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/modifierEmployee/' . $valiny->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <h5>Matricule: {{ $valiny->id }}</h5>
                                                        <input type="hidden" value="{{ $valiny->id }}">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="Nom" class="textLabel">Nom</label>
                                                                    <input type="text" name="Anarana"
                                                                        class="form-control " value="{{ $valiny->Nom }}"
                                                                        @error('Anarana') is-invalid @enderror>
                                                                    @error('Anarana')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="Prenom" class="textLabel">Prénom</label>
                                                                    <input type="text" name="Fanampiny"
                                                                        class="form-control"
                                                                        value="{{ $valiny->Prenom }}"@error('Fanampiny') is-invalid @enderror>
                                                                    @error('Fanampiny')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div><br><br><br>
                                                            <div class="form-group container">
                                                                <label for="Email" class="textLabel">Email</label>
                                                                <input type="email" name="Mailaka" class="form-control"
                                                                    value="{{ $valiny->Email }}"@error('Mailaka') is-invalid @enderror>
                                                                @error('Mailaka')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div><br><br><br><br>

                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="Age" class="textLabel">Age</label>
                                                                    <input type="number" name="Age"
                                                                        class="form-control"value="{{ $valiny->Age }}"@error('Age') is-invalid @enderror>
                                                                    @error('Age')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div><br>

                                                            </div>

                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="telephone"
                                                                        class="textLabel">Telephone</label>
                                                                    <input type="number" name="Laharana"
                                                                        class="form-control"
                                                                        value="{{ $valiny->Telephone }}"
                                                                        @error('Laharana') is-invalid @enderror>
                                                                    @error('Laharana')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="cin" class="textLabel">CIN</label>
                                                                    <input type="text" name="CIN"
                                                                        class="form-control" value="{{ $valiny->CIN }}"
                                                                        @error('CIN') is-invalid @enderror>
                                                                    @error('CIN')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group ">
                                                                    <label for="Adresse"
                                                                        class="textLabel">Adresse</label>
                                                                    <input type="text" name="Adresse"
                                                                        class="form-control"
                                                                        value="{{ $valiny->Addresse }}"@error('Adresse') is-invalid @enderror>
                                                                    @error('Adresse')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <center>
                                                                <div class="mb-3">
                                                                    <label for="{{ 'formFileDisabled' . $valiny->id }}"
                                                                        class="TypeFile form-group">Photo
                                                                        selectionnée</label>
                                                                    <input class="form-control" name="Sary"
                                                                        type="file" id="{{ 'formFileDisabled' . $valiny->id }}"
                                                                        @error('Sary') is-invalid @enderror>
                                                                    <img src="{{ asset('storage/ImageEmployee/' . $valiny->Profil) }}"
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
                                                                        <option value="Antananarivo">Antananarivo</option>
                                                                        <option value="Antsirabe">Antsirabe</option>
                                                                        <option value="Fianarantsoa">Fianarantsoa</option>
                                                                        <option value="Toliary">Toliary</option>
                                                                        <option value="Antsiranana">Antsiranana</option>
                                                                        <option value="Mahajanga">Mahajanga</option>
                                                                        <option value="Toamasina">Toamasina</option>
                                                                    </select>
                                                                </div>
                                                            </div><br>
                                                            <div class="col">
                                                                <label for="Position">Role</label>
                                                                <div class="form-group">
                                                                    <select class="form-select" aria-label=""
                                                                        name="Position">
                                                                        <option value="Infographistes">Infographistes
                                                                        </option>
                                                                        <option value="Développeurs Mobile">Développeurs
                                                                            Mobile</option>
                                                                        <option value="Développeurs web">Développeurs web
                                                                        </option>
                                                                        <option value="Intégrateur Web">Intégrateur Web
                                                                        </option>
                                                                        <option value=" Commerciales"> Commerciales
                                                                        </option>
                                                                        <option value="Gestionnaire de contenu">
                                                                            Gestionnaire de contenu</option>
                                                                    </select>
                                                                </div>
                                                            </div><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Fermer</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Valider</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="{{ '#Presence' . $valiny->id }}"
                                        class="btn btn-primary container">
                                        <i class="fa-regular fa-file-powerpoint contai"></i></button></strong>

                                          {{-- Fin PRESENCE --}}
                                    <div class="modal fade" id="{{ 'Presence' . $valiny->id }}" tabindex="-1"
                                        aria-labelledby="PresenceLabel" aria-hidden="true" data-backdrop="static"
                                        data-keyboard="false">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header modalEditStaff">
                                                    <h5 class="modal-title" id=""><strong>Présence d'
                                                            Employé</strong></h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $valiny->Prenom }}
                                                    <form action="{{ route('SauverPresence') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="employeeId" value="{{ $valiny->id }}">
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
                                                   </div><br><br>
                                                </form>
                                            </div>

                                               
                                            </div>
                                        </div>
                                    </div>

                                    {{-- modal PRESENCE --}}
                                </td>
                            </tr>
                         

                           
                        @endforeach
                    @else
                        <center>
                            <tr>
                                <td>Aucun resultat trouvé</td>
                            </tr>
                        </center>
                    @endif

                </tbody>
            </table>
           <center>
            
               <div class="pagination-block pagina">
                {{ $resultat->links('layouts.paginationlinks') }}
               </div>
            
           </center>
        </div>
    @endif



@endsection
