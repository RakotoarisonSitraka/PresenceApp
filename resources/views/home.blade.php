@extends('layouts.app')
@section('titre')
    Page d'accueil
@endsection
@section('content')
    <div class="container vatana home cont ">
        <div class="row justify-content-center">
            <div class="col-md-13">
                <div class="card-header">
                    <h6 class="h6">Liste des Employees <a href="{{ url('Ajout-employee') }}"
                            class="fa-solid fa-square-plus fontAdd "></a></h6>
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
                                            <img class="ImgEmployee"
                                                src="{{ asset('/storage/imageEmployee/' . $staff->Profil) }}" width="87"
                                                height="78" alt="image">

                                        </strong>
                                    </td>
                                    {{-- data-toggle="modal" data-target="#Supprim" --}}
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
                                                        Voulez vous Supprimer cette employée??
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
                                    <td><strong><button type="button" data-toggle="modal" data-target="#Modifier"
                                                class="btn btn-success container">
                                                <i class="fa-solid fa-file-pen"></i></button></strong>
                                    </td>
                                    <td><strong><button type="button" data-toggle="modal"
                                                data-target="{{ '#Presence' . $staff->id }}"
                                                class="btn btn-primary container">
                                                <i class="fa-regular fa-file-powerpoint contai"></i></button></strong>

                                    </td>

                                    {{-- Fin PRESENCE --}}
                                    <div class="modal fade" id="{{ 'Presence' . $staff->id }}" tabindex="-1"
                                        aria-labelledby="PresenceLabel" aria-hidden="true" data-backdrop="static"
                                        data-keyboard="false">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id=""><strong>Présence des
                                                            Employés</strong></h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Prenom: {{ $staff->Prenom }} </h4><br>
                                                   <center> Option:</center><select class="form-select md-6" aria-label="" name="">
                                                        <option selected>Absent</option>
                                                        <option value="">Present</option>
                                                    </select><br>
                                                    <div class="row form-group">
                                                        <label for="date" class="col-sm-3 ">Date d'Aujourd'hui</label>
                                                        <div class="col-sm-6">
                                                            <div class="input-group date" id="datepicker">
                                                                <input type="date" class="form-control">

                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="row form-group">
                                                        <label for="date" class="col-sm-3 ">Heure d'entrée</label>
                                                        <div class="col-sm-6">
                                                            <div class="input-group date" id="datepicker">
                                                                <input type="Time" class="form-control"
                                                                    min="00:00">

                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="row form-group">
                                                        <label for="date" class="col-sm-3 ">Heure de sortie</label>
                                                        <div class="col-sm-6">
                                                            <div class="input-group date" id="datepicker">
                                                                <input type="Time" class="form-control"
                                                                    min="00:00">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br><br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Fermer</button>
                                                    <button type="button" class="btn btn-primary">Enregistrer</button>
                                                </div><br><br>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- modal PRESENCE --}}
                            @endforeach
                            </tr>
                        @endif


                    </table>
                    <div class="pagination-block homepagination">
                        {{ $Employes->links('layouts.paginationlinks') }}
                    </div>
                </div>


            </div>
        </div>

        {{-- fin --}}

        {{-- modal modification --}}
        <div class="modal fade" id="Modifier" tabindex="-1" aria-labelledby="ModifierLabel" aria-hidden="true"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModifierLabel"><strong>Modification d'Employée</strong></h5>
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
