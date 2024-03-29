@extends('layouts.app')
@section('titre')
Enregistrement d'administrateur
@endsection
@section('content')
    <div class="container reg register">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2>Enregistrement d' administrateur</h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end regist">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end regist">{{ __(' Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end regist">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end regist">{{ __('Confirmation du mot de passe ') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                               <div class="btn-group" >
                                <button type="submit" class="btn btn-primary active">
                                    {{ __('Enregistrer') }}
                                </button>
                                <a href="/home" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="left" title="retour à Accueil">
                                    Annuler
                                </a>  

                               </div>
                                {{-- <div class="btn-group">
                                    <a href="#" class="btn btn-primary active" aria-current="page">Active link</a>
                                    <a href="#" class="btn btn-primary">Link</a>
                                    <a href="#" class="btn btn-primary">Link</a>
                                  </div> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
