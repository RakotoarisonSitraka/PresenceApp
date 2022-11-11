@extends('layouts.app')
@section('titre')
    les projets
@endsection
@section('content')
    <table class="table table-hover tableDomaine ">
        <thead>
            <tr class="table-warning">
                <th scope="col">Nom de l'employé</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de démmission</th>
                <th scope="col">Raison</th>
                <th>Option</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          
            {{-- @if ($ListeProjets->count())
                @foreach ($ListeProjets as $ListeProjet) --}}
                    <tr>
                        <td scope="row">Radoda</td>
                        <td>Pierrot</td>
                        <td>20-11-22</td>
                        
                        <td>
                           
                            Confidentiel
                        </td>

                      
                        <td><button type="button" class="btn btn-danger ">Supprimer  <i class=" fa-solid fa-minus"></i></button></td>
                    </tr>
                    <tr>
                        <td scope="row">Rasoanitazana</td>
                        <td>Fitahiana Angèle</td>
                        <td>03-11-22</td>
                        
                        <td>
                           
                            Confidentiel
                        </td>

                      
                        <td><button type="button" class="btn btn-danger ">Supprimer  <i class=" fa-solid fa-minus"></i></button></td>
                    </tr>
                    <tr>
                        <td scope="row">Randrianantoandro</td>
                        <td>Gaspard</td>
                        <td>09-03-22</td>
                        
                        <td>
                           
                            Confidentiel
                        </td>

                      
                        <td><button type="button" class="btn btn-danger ">Supprimer  <i class=" fa-solid fa-minus"></i></button></td>
                    </tr>
                    <tr>
                        <td scope="row">Rakotoraniry</td>
                        <td>Viennne</td>
                        <td>30-05-21</td>
                        
                        <td>
                           
                            Confidentiel
                        </td>

                      
                        <td><button type="button" class="btn btn-danger ">Supprimer <i class=" fa-solid fa-minus"></i></button></td>
                    </tr>
                    <tr>
                        <td scope="row">Rabemanana</td>
                        <td>Rijatiana</td>
                        <td>20-03-21</td>
                        
                        <td>
                           
                            Confidentiel
                        </td>

                      
                        <td><button type="button" class="btn btn-danger">Supprimer <i class=" fa-solid fa-minus"></i></button></td>
                    </tr>
                  

                      
                       
                    </tr>
                {{-- @endforeach --}}
                <caption>
                  <h2>Liste des démissions</h2>
              </caption>
            {{-- @else
                <td>Aucun Projet affiché</td>
                <td></td>
            @endif --}}

            @if (session('status'))
                <caption class="alert alert-success container" role="alert">
                    {{ session('status') }}
                </caption>
            @endif
            <caption>
                <button data-toggle="modal" data-target="#ProjeModal" type="button" class="btn btn-primary">
                    Créer une démission <i class="fa-sharp fa-solid fa-circle-plus"></i></button>
            </caption>
        </tbody>
        {{-- modal projet --}}
        <div class="modal fade" id="ProjeModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Selection d'employé </h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            
                            <form action="{{ route('AjoutDemission')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 divNomProjet">
                                    <label for="recipient-name" class="col-form-label">Nom de l'employé:</label>
                                    <select class="form-select" aria-label="" name="">
                                        <option selected><strong>Rabemanantsoa</strong></option>
                                     
                                       
                                    </select>
                                </div>
                                <div class="mb-3 divNomProjet">
                                    <label for="recipient-name" class="col-form-label">Prénom:</label>
                                    <select class="form-select" aria-label="" name="">
                                        <option selected><strong>Jean Jacque</strong></option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Date de démission:</label>
                                    <input type="date" class="form-control" name="DateDemission"
                                        @error('DateDemission') is-invalid @enderror>
                                    @error('DateDemission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Raison:</label>
                                    <textarea type="text" name="Raison" class="form-control" id="message-text"
                                        @error('Raison') is-invalid @enderror>
                                    </textarea>
                                    @error('Raison')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                              

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler <i class="fa-solid fa-xmark"></i></button>
                        <button type="submit" class="btn btn-primary">Valider <i
                                class="fa-solid fa-square-check"></i></button>
                    </div>
                    </form>
                </div>
            </div>
    </table>
    
    {{-- <center>
        <div class="pagination-block homepagination paginationProjet">
            {{ $ListeProjets->links('layouts.paginationlinks') }}
        </div>
    </center> --}}
@endsection
