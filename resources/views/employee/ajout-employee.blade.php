@extends('layouts.app')
@section('titre')
    Ajout d'employée
@endsection
@section('content')
    <center>
        <div class="containerr">
            <div class="carde">
                <div class="card-body">
                    <div class="circle"></div>
                    <header class="myHead text-center">
                        <i class="fa fa-registered "></i>
                        <p>Enregistrement</p>
                    </header><br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('add-employee') }}" class="main-form text-center" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-0">
                            <label class="my-0">
                                <i class="fas fa-user font fonte"></i>
                                <input type="text" name="Anarana" placeholder="Nom" type="text" class="MyInput"
                                    @error('Anarana') is-invalid @enderror id="">

                                @error('Anarana')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group my-0">
                            <label class="my-0">
                                <i class="fas fa-user font fonte"></i>
                                <input type="text" name="Fanampiny" placeholder="Prenom" type="text" class="MyInput"
                                    @error('Fanampiny') is-invalid @enderror id="">

                                @error('Fanampiny')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group my-0">
                            <label class="my-0">
                                <i class="fa-regular fa-envelope font fonte"></i>
                                <input type="email" name="Mailaka"placeholder="Email" type="text" class="MyInput"
                                    @error('Mailaka') is-invalid @enderror id="">

                                @error('Mailaka')
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

                                <input name="Laharana" placeholder="Numéro téléphone" type="text" class="MyInput"
                                    @error('Laharana') is-invalid @enderror id="">

                                @error('Laharana')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group my-0">
                            <input type="file" name="Sary" id="file" @error('Sary') is-invalid @enderror>
                            <label for="file" class="label">
                                <i class="fa-solid fa-image File"></i>
                                Inserer une photo
                            </label>
                        </div>
                        @error('Sary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                        <div class="form-group">
                            <label>
                                <button class="form-control bouton">Enregistrer</button>
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
