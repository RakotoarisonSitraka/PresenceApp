@extends('layouts.app')
@section('titre')
    les projets
@endsection
@section('content')
    <table class="table table-hover tableDomaine ">
        <thead>
            <tr class="table-warning">
                <th scope="col">Nom du projet</th>
                <th scope="col">Création</th>
                <th scope="col">Description</th>
                <th scope="col">Etat</th>
                <th scope="col">Domaine</th>
                <th scope="col">Action</th>
                <th></th>
                {{-- <th scope="col">
              <button data-toggle="modal" data-target="#"
                type="button" class="btn btn-success">
                Ajouter un projet <i class="fa-sharp fa-solid fa-circle-plus"></i></button></strong> --}}
                {{-- <i class="fa-sharp fa-solid fa-circle-plus"></i> --}}

            </tr>
        </thead>
        <tbody>
          
            @if ($ListeProjets->count())
                @foreach ($ListeProjets as $ListeProjet)
                    <tr>
                        <td scope="row">{{ $ListeProjet->NomDuProjet }}</td>
                        <td>{{ $ListeProjet->DateCreation }}</td>
                        <td>{{ $ListeProjet->Description }}</td>
                        <td>{{ $ListeProjet->Etat }}</td>
                        <td>
                            @if ($ListeProjet->domaine)
                                {{ $ListeProjet->domaine->NomDomaine }}
                            @else
                                <span class="rounded-pill spanProjet"> Retiré</span>
                            @endif
                        </td>

                        <td><button type="button" class="btn btn-success">Modifier</button></td>
                        <td><button type="button" class="btn btn-danger">Retirer</button></td>
                    </tr>
                @endforeach
                <caption>
                  <h2>Liste des projets</h2>
              </caption>
            @else
                <td>Aucun Projet affiché</td>
                <td></td>
            @endif

            @if (session('status'))
                <caption class="alert alert-success container" role="alert">
                    {{ session('status') }}
                </caption>
            @endif
            <caption>
                <button data-toggle="modal" data-target="#ProjetModal" type="button" class="btn btn-primary">
                    Ajouter un projet <i class="fa-sharp fa-solid fa-circle-plus"></i></button>
            </caption>
        </tbody>
        {{-- modal projet --}}
        <div class="modal fade" id="ProjetModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Ajout d'un projet</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form action="{{ route('InsertionProjet') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 divNomProjet">
                                    <label for="recipient-name" class="col-form-label">Nom de projet:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="NomDuProjet"
                                        @error('NomDuProjet') is-invalid @enderror>
                                    @error('NomDuProjet')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Date de création:</label>
                                    <input type="date" class="form-control" name="DateCreation"
                                        @error('DateCreation') is-invalid @enderror>
                                    @error('DateCreation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Description:</label>
                                    <textarea type="text" name="Description" class="form-control" id="message-text"
                                        @error('Description') is-invalid @enderror>
                </textarea>
                                    @error('Description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Domaine:</label>
                                    <select class="form-select" aria-label="" name="domaineDuProjet">
                                        @foreach ($Domaines as $Sehatra)
                                            <option value="{{ $Sehatra->id }}">{{ $Sehatra->NomDomaine }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Etat:</label>
                                    <select class="form-select" aria-label="" name="Etat">
                                        <option selected><strong>à faire</strong></option>
                                        <option value="En_progression">En progression</option>
                                        <option value="Realise">Réalisé</option>
                                    </select>
                                </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter <i
                                class="fa-sharp fa-solid fa-circle-plus"></i></button>
                    </div>
                    </form>
                </div>
            </div>
    </table>
    
    <center>
        <div class="pagination-block homepagination paginationProjet">
            {{ $ListeProjets->links('layouts.paginationlinks') }}
        </div>
    </center>
@endsection
