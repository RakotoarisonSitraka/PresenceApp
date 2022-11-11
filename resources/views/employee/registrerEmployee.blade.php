@extends('layouts.app')
@section('titre')
    Enregistrement
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-warning" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('add-employee') }}" class=" formee formRegister" enctype="multipart/form-data" method="POST">
        @csrf
        <div>
            <li class="enregistrement">
                <h2><span class="fa fa-registered p"></span><span class="p">Enregistrement</span></h2>
            </li>
            <li>
        </div><br>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="Nom" class="textLabel">Nom</label>
                    <input type="text" name="Anarana" class="form-control " @error('Anarana') is-invalid @enderror>
                    @error('Anarana')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label for="Prenom" class="textLabel">Prénom</label>
                    <input type="text" name="Fanampiny" class="form-control" @error('Fanampiny') is-invalid @enderror>
                    @error('Fanampiny')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div><br>
            <div class="col">
                <div class="form-group ">
                    <label for="Age" class="textLabel">Age</label>
                    <input type="number" name="Age" class="form-control"  @error('Age') is-invalid @enderror>
                    @error('Age')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div><br><br><br>
            <div class="form-group ">
                <label for="Email" class="textLabel">Email</label>
                <input type="email" name="Mailaka" class="form-control" @error('Mailaka') is-invalid @enderror>
                @error('Mailaka')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div><br><br><br><br>
            {{-- <div class="col">
                <div class="form-group">
                    <label for="Matricule" class="textLabel">Matricule</label>
                    <input type="number" name="Matricule" class="form-control"  @error('Matricule') is-invalid @enderror>
                    @error('Matricule')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}
          
            <div class="col">
                <div class="form-group">
                    <label for="telephone" class="textLabel">Telephone</label>
                    <input type="number" name="Laharana" class="form-control"  @error('Laharana') is-invalid @enderror>
                    @error('Laharana')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label for="cin" class="textLabel">CIN</label>
                    <input type="text" name="CIN" class="form-control"  @error('CIN') is-invalid @enderror>
                    @error('CIN')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div><br><br><br><br>
            <div class="col">
                <div class="form-group ">
                    <label for="Adresse" class="textLabel">Adresse</label>
                    <input type="text" name="Adresse" class="form-control" @error('Adresse') is-invalid @enderror>
                    @error('Adresse')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="telephone" class="textLabel">Date d'embauche</label>
                    <input type="date" name="DateEntree" class="form-control"  @error('DateEntree') is-invalid @enderror>
                    @error('DateEntree')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="formFileDisabled" class="TypeFile form-group">Photo <i class="fa-solid fa-image"></i></label>
                <input class="form-control"  name="Sary" type="file" id="formFileDisabled" @error('Sary') is-invalid @enderror>
               
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-select" aria-label="" name="Ville">
                        <option selected><strong>--Ville d'origine--</strong></option>
                        <option value="Antananarivo">Antananarivo</option>
                        <option value="Antsirabe">Antsirabe</option>
                        <option value="Fianarantsoa">Fianarantsoa</option>
                        <option value="Toliary">Toliary</option>
                        <option value="Antsiranana">Antsiranana</option>
                        <option value="Mahajanga">Mahajanga</option>
                        <option value="Toamasina">Toamasina</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-select" aria-label="" name="Sexe">
                        <option selected><strong>--Sexe--</strong></option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                       
                    </select>
                </div>
            </div>  
            <div class="col">
                <div class="form-group">
                    <select class="form-select" aria-label="" name="Domaine">
                        <option selected><strong>Domaine</strong></option>
                       @foreach ($Domaine as $Sehatra)
                           <option value="{{ $Sehatra->id }}">{{ $Sehatra->NomDomaine }}</option>
                       @endforeach
                       
                    </select>
                </div>
            </div>   
           

            {{-- <div class="col">
                <div class="form-group">
                    <select class="form-select" aria-label="" name="Section">
                        <option selected>Section</option>
                        <option value="Webmarketing">Webmarketing</option>
                        <option value="Developpement">Developpement</option>
                        <option value="Web Design">Web Design</option>
                        <option value="E-commerce">E-commerce</option>
                        <option value="Branding">Branding</option>
                    </select>
                </div>
            </div> --}}
            <div class="col">
                <div class="form-group">
                    <select class="form-select" aria-label="" name="role">
                        <option selected><strong>--Fonction--</strong></option>
                        @foreach ($roles as $anjara)
                            <option value="{{ $anjara->id }}">{{ $anjara->Type_Role}}</option>
                        @endforeach
                    </select>
                </div>

                {{-- {{ $roles->employee->Type_Role}} --}}
            </div><br><br><br>

        </div>
        <center>
            <button class="btn btn-success but mx-auto btnRegister">Enregistrer <i class="fa-solid fa-floppy-disk"></i></button>
        </center><br><br>


    </form>
@endsection
