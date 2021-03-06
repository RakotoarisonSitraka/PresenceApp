@extends('layouts.app')
@section('titre')
    Page d'accueil
@endsection
@section('content')
    <div class="container vatana home ">
        <div class="row justify-content-center">
            <div class="col-md-13">
                <div class="card-header"><h6 class="h6">Liste des Employees <i href="#" class="fa-solid fa-square-plus fontAdd"></i></h6>
                </div>
                <div>
        </div>
                <div class="scroll">
                    <table class="table tab">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <tr class="">
                            <td class="table-light" id="td"><strong>
                                    <h5 class="titre" id="td">Id</h5>
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
                            <td class=" " id="td"><strong>
                                    <h5 class="titre">Telephone</h5>
                                </strong></td>
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
                                    <td class="" id="td"><strong>{{ $staff->Telephone }}</strong></td>
                                    {{-- <img src="{{ url('/uploads/cat_banner_img/'.$cat->cat_banner) }}" width="110" height="40" /> --}}
                                    <td class="" id="td">
                                        <strong>
                                            <img class ="ImgEmployee"src="{{ asset('/storage/imageEmployee/'.$staff->Profil)}}" width="87" height="78" alt="image">
                    
                                        </strong>
                                    </td>
                                    <td><strong><button type="button" data-toggle="modal" data-target="#Supprim"
                                                class="btn btn-danger container">
                                                <i class="fa-solid fa-trash"></i></button></strong>
                                    </td>
                                    <td><strong><button type="button" data-toggle="modal" data-target="#Modifier"
                                                class="btn btn-success container">
                                                <i class="fa-solid fa-file-pen"></i></button></strong>
                                    </td>
                                    <td><strong><button type="button" data-toggle="modal" data-target=""
                                        class="btn btn-primary container">
                                        <i class="fa-solid fa-eye"></i></button></strong>
                            </td>
                            @endforeach
                            </tr>
                        @endif
                    </table>
                </div>
                {{-- modal suppression --}}
                <div class="modal fade" id="Supprim" tabindex="-1" role="dialog" aria-labelledby="SuppLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1><strong>Suppression</strong></h1>
                            </div>
                            <div class="modal-body">
                                Voulez vous Supprimer cette employ??e??
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-danger" href="{{ url('/Supprimer/' . $staff->id) }}">Oui</a>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- fin --}}
        {{-- modal modification --}}
        <div class="modal fade" id="Modifier" tabindex="-1" aria-labelledby="ModifierLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModifierLabel"><strong>Modification d'Employ??e</strong></h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Fin --}}


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
                    @endif  --}}
                       
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
