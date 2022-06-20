@extends('layouts.app')
@section('titre')
Page d'accueil
    
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Administrateur') }}</div>
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
                                    <h5>Email</h5>
                                </strong></td>
                            <td><strong>
                                    <h5>
                                        <center>Options</center>
                                    </h5>
                                </strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            @if (Auth::user())
                            <td> {{ Auth::user()->id }}</td>
                            <td> {{ Auth::user()->name }}</td>
                            <td> {{ Auth::user()->email }}</td>
                            <td><strong><span
                                class="btn btn-success container p-2"  style="--bs-bg-opacity: .5">Actif</span></strong></td>
                            @endif
                        </tr>
                        @if (is_countable($users) && count($users) != 0)
                            @foreach ($users as $user)
                                <tr class="">
                                    <td class="table-warning"><strong>{{ $user->id }}</strong></td>
                                    <td class="table-danger"><strong>{{ $user->name }}</strong></td>
                                    <td class="table-info"><strong>{{ $user->email }}</strong></td>
                                    <td><strong><button type="button" data-toggle="modal" data-target="#Supprim"
                                                class="btn btn-danger">Supprimer</button></strong></td>
                            @endforeach
                            </tr>
                        @endif
                        {{-- Debut modal suppUser --}}
                        <div class="modal fade" id="Supprim" tabindex="-1" role="dialog" aria-labelledby="SuppLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                        <h1>Suppression</h1> --}}
                                    <div class="modal-body">
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
    </div>
@endsection
