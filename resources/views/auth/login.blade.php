@extends('layouts.app')
@section('titre')
    Connexion d'administrateur
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card CardLogin">
                    <img src="{{ asset('img/nogae.jpg') }}" alt="" width="345px" height="230px" class="sar"><br><br>
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                    <i class="fa-light fa-envelope-dot"></i>

                    <div class="card-body BodyLogin">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end"><h4 class="loginh4"></h4></label>

                                <div class="col-md-6 InputWithIcon IconBg ">
                                    <input id="email" type="email" placeholder="Tapez votre Email...."
                                        class="form-control MyInput @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>  
                                        <i class="fa-solid fa-envelope"></i>    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end"><h4 class="loginh4"></h4></label>

                                <div class="col-md-6 InputWithIcon IconBg">
                                    <input id="password" type="password" placeholder="Tapez votre mot de passe...."
                                        class="form-control MyInput @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                        <i class="fa-solid fa-lock i"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    
                                        <button type="submit" class="btn btn-primary b button">
                                            {{ __("S'Authentifier") }}
                                        </button>
                                    

                                    {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
