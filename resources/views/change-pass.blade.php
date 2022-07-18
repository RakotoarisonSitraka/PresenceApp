@extends('layouts.app')
@section('titre')
    Modification du mot de passe
@endsection

@section('content')
    <div class="container Password">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modification mot de passe') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('update-mdp') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="oldPasswordInput" class="form-label">Ancien mot de passe</label>
                                <div class="col-md-18 modifUser Icon">
                                    <input name="Ancien_mot_de_passe" type="password" class="form-control"
                                        @error('Ancien_mot_de_passe') is-invalid @enderror id="oldPasswordInput">
                                    <i class="fa-solid fa-lock"></i>
                                    @error('Ancien_mot_de_passe')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="newPasswordInput" class="form-label">Nouveau mot de passe</label>
                                <div class="col-md-18 modifUser Icon">
                                    <input name="Nouveau_mot_de_passe" type="password" class="form-control"
                                        @error('Nouveau_mot_de_passe') is-invalid @enderror id="newPasswordInput">
                                    <i class="fa-solid fa-key"></i>
                                    @error('Nouveau_mot_de_passe')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirmation</label>
                                <div class="col-md-18 modifUser Icon">
                                    <input name="confirmation_de_mot_de_passe" type="password" class="form-control"
                                        @error('confirmation_de_mot_de_passe') is-invalid @enderror
                                        id="confirmNewPasswordInput" placeholder="Confirmation de nouveau mot de passe..">
                                    <i class="fa-solid fa-key"></i>
                                    @error('confirmation_de_mot_de_passe')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <center>
                                    <button class="btn btn-success col-md-4">Modifier</button>
                                    <a href="/home" class="btn btn-outline-primary" data-bs-toggle="tooltip"
                                        data-bs-html="true" data-bs-placement="left" title="retour à Accueil">
                                        Annuler
                                    </a>
                                </center>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
