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
    <form action="{{ route('add-employee') }}" class=" formee" enctype="multipart/form-data" method="POST">
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
            <div class="mb-3">
                <label for="formFileDisabled" class="TypeFile form-group">Photo</label>
                <input class="form-control"  name="Sary" type="file" id="formFileDisabled" @error('Sary') is-invalid @enderror>
               
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-select" aria-label="">
                        <option selected>Ville d'origine</option>
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
                    <select class="form-select" aria-label="">
                        <option selected>Section</option>
                        <option value="Webmarketing">Webmarketing</option>
                        <option value="Developpement">Developpement</option>
                        <option value="Web Design">Web Design</option>
                        <option value="E-commerce">E-commerce</option>
                        <option value="Branding">Branding</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-select" aria-label="">
                        <option selected>Position</option>
                        <option value="Infographistes">Infographistes</option>
                        <option value="Développeurs Mobile">Développeurs Mobile</option>
                        <option value="Intégrateur Web">Intégrateur Web</option>
                        <option value=" Commerciales"> Commerciales</option>
                        <option value="Gestionnaire de contenu">Gestionnaire de contenu</option>
                    </select>
                </div>
            </div><br><br><br>

        </div>
        <center>
            <button class="btn btn-success but mx-auto">Enregistrer</button>
        </center>


    </form>
@endsection
