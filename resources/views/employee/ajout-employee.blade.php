@extends('layouts.app')
@section('titre')
    Ajout d'employée
@endsection
@section('content')
        <center>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-warning" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="containerr">
                <div class="carde">
                    <div class="card-body">
                        <div class="circle"></div>
                        <header class="myHead text-center">
                            <i class="far fa-user "></i>
                            <p>Enregistrement</p>
                        </header><br>
                        <form action="" class="main-form text-center">
                            <div class="form-group my-0">
                                <label class="my-0">
                                    <i class="fas fa-user font fonte"></i>
                                    <input type="text" name="" placeholder="Nom" type="text" class="MyInput" @error('') is-invalid @enderror
                                        id="">

                                    @error('')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="form-group my-0">
                                <label class="my-0">
                                    <i class="fas fa-user font fonte"></i>
                                    <input  type="text" name="" placeholder="Prenom" type="text" class="MyInput" @error('') is-invalid @enderror
                                        id="">

                                    @error('')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="form-group my-0">
                                <label class="my-0">
                                    <i class="fa-regular fa-envelope font fonte"></i>
                                    <input type="email" name=""placeholder="Email"  type="text" class="MyInput" @error('') is-invalid @enderror
                                        id="">

                                    @error('')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            {{-- <div class="form-group my-0">
                                <label class="my-0">
                                    <i class="fa-regular fa-calendar font fonte"></i>
                                    <input type="date" name=""placeholder="date de naissance"  type="text" class="MyInput" @error('') is-invalid @enderror
                                        id="">

                                    @error('')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div> --}}
                            <div class="form-group my-0">
                                <label class="my-0">
                                    <i class="fa-solid fa-phone font fonte"></i>
                                    
                                    <input name="" placeholder="Numéro téléphone" type="text" class="MyInput" @error('') is-invalid @enderror
                                        id="">

                                    @error('')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="form-group my-0">
                                <input type="file" id="file" accept="image/*">
                                <label for="file" class="label">
                                    <i class="fa-solid fa-image File"></i>
                                    Inserer une photo
                                </label>
                            </div><br>
                            <div class="form-group">
                                <label>
                                    <input type="button" class="form-control bouton" value="ENREGISTRER">
                                </label>

                            </div>
                        </form>
                </div>
                    </div>
                   
            </div>
            {{-- <form action="">
            <div class="col-md-4 ">
                <input name="" type="text" class="form-control"
                    @error('') is-invalid @enderror id="">
               
                @error('')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div><br><br>
            <div class="col-md-4 ">
                <input name="" type="text" class="form-control"
                    @error('') is-invalid @enderror id="">
               
                @error('')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div><br><br>
            <div class="col-md-4 ">
                <input name="" type="text" class="form-control"
                    @error('') is-invalid @enderror id="">
               
                @error('')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4 ">
                <label for="formFileLg" class="form-label"></label>
                <input class="form-control form-control-lg" id="formFileLg" type="file">
              </div>
            
        </form> --}}
        </center>
@endsection
{{-- choisir un fichier
    <div>
  <label for="formFileLg" class="form-label">Large file input example</label>
  <input class="form-control form-control-lg" id="formFileLg" type="file">
</div> --}}
