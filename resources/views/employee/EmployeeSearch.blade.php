@extends('layouts.app')
@section('titre')
    Resultat du recherche
@endsection
@section('content')
    <br>
    <br>
    <br>
    @if (isset($resultat))
        <div class="scroll recherche">
            <center>
                <h2 class="hh2">Resultats des recherches d'employees</h2>
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
                        <th scope="col">Adresse</th>
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
                                <td>{{ $valiny->Addresse }}</td>
                                <td> <strong>
                                        <img class="ImgEmployee"
                                            src="{{ asset('/storage/imageEmployee/' . $valiny->Profil) }}" width="87"
                                            height="78" alt="image">

                                    </strong></td>
                                <td>
                                    <button data-toggle="modal" data-target="{{ '#Supprim' . $valiny->id }}" type="button"
                                        class="btn btn-danger container">
                                        <i class="fa-solid fa-trash"></i></button></strong>
                                </td>
                                <td>
                                    <strong><button type="button" data-toggle="modal" data-target="#Modifier"
                                            class="btn btn-success container">
                                            <i class="fa-solid fa-file-pen"></i></button></strong>
                                </td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target=""
                                        class="btn btn-primary container">
                                        <i class="fa-solid fa-eye"></i></button></strong>
                                </td>
                            </tr>
                            {{-- modal modification --}}
                            <div class="modal fade rechercheee" id="Modifier" tabindex="-1" aria-labelledby="ModifierLabel"
                                aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModifierLabel"><strong>Modification
                                                    d'Employée</strong></h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label for="Nom" class="col-form-label">Nom:</label>
                                                    <input type="text" class="form-control" id="Nom">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Prenom" class="col-form-label">Prenom:</label>
                                                    <input type="text" class="form-control" id="Prenom">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Email" class="col-form-label">Email:</label>
                                                    <input type="email" class="form-control" id="Email">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="text" class="col-form-label">Telephone:</label>
                                                    <input type="text" class="form-control" id="Telephone">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Send message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Fin --}}

                            {{-- modal suppression --}}
                            <div class="modal fade rechercheee" id="{{ 'Supprim' . $valiny->id }}" tabindex="-1"
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

                                            <a class="btn btn-danger" href="/Supprimer/{{ $valiny->id }}">Oui</a>

                                            {{-- <a class="btn btn-danger" href="/Supprimer/{{$staff->id}}">Oui</a> --}}

                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Non</button>
                                        </div>
                                    </div>
                                    {{-- fin --}}
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
        </div>
    @endif



@endsection
