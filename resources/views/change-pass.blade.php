@extends('layouts.app')
@section('titre')
Modification du mot de passe 
@endsection

@section('content')
    <div class="container">
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
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Ancien mot de passe</label>
                                <input name="Ancien_mot_de_passe" type="password" class="form-control"
                                    @error('Ancien_mot_de_passe') is-invalid @enderror id="oldPasswordInput">
                                @error('Ancien_mot_de_passe')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Nouveau mot de passe</label>
                                <input name="Nouveau_mot_de_passe" type="password" class="form-control"
                                    @error('Nouveau_mot_de_passe') is-invalid @enderror id="newPasswordInput">
                                @error('Nouveau_mot_de_passe')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirmation</label>
                                <input name="confirmation_de_mot_de_passe" type="password" class="form-control"
                                    @error('confirmation_de_mot_de_passe') is-invalid @enderror id="confirmNewPasswordInput"
                                    placeholder="Confirmation de nouveau mot de passe..">
                                @error('confirmation_de_mot_de_passe')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success">Modifier</button>
                                <a href="/home" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="left" title="retour à Accueil">
                                    Annuler
                                </a>  
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
