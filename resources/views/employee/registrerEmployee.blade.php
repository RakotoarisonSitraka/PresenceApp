@extends('layouts.app')
@section('titre')
    Enregistrement
@endsection
@section('content')
    <form action=""class=" formee">
      <div>
        <li class="enregistrement"><h2><span
            class="fa fa-registered p"></span><span class="p">Enregistrement</span></h2></li>
        <li>
      </div><br>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="Nom"  class="textLabel">Nom</label>
                    <input type="text" name="" class="form-control ">
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label for="Prenom" class="textLabel">Prénom</label>
                    <input type="text" name="" class="form-control">
                </div>
            </div><br>
            <div class="col">
                <div class="form-group ">
                    <label for="Age" class="textLabel">Age</label>
                    <input type="number" name="" class="form-control">
                </div>
            </div><br><br><br>
            <div class="form-group ">
                <label for="Email" class="textLabel">Email</label>
                <input type="email" name="" class="form-control">
            </div><br><br><br><br>
            <div class="col">
                <div class="form-group">
                    <label for="telephone" class="textLabel">Telephone</label>
                    <input type="number" name="" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label for="cin" class="textLabel">CIN</label>
                    <input type="text" name="" class="form-control">
                </div>
            </div><br><br><br><br>
            <div class="col">
                <div class="form-group ">
                    <label for="Adresse" class="textLabel">Adresse</label>
                    <input type="text" name="" class="form-control">
                </div>
            </div>
            <div class="mb-3 ">
                <label for="formFileDisabled" class="TypeFile form-group">Photo</label>
                <input class="form-control" type="file" id="formFileDisabled">
            </div>
           <div class="col">
            <div class="form-group">
                <select class="form-select" aria-label="">
                    <option selected>Section</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
            </div>
           </div>
          <div class="col">
            <div class="form-group">
                <select class="form-select" aria-label="">
                    <option selected>Position</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
            </div>
          </div><br><br><br>
         
        </div>
       <center>
        <button type="submit" class="btn btn-success but mx-auto">Enregistrer</button>
       </center>


    </form>
@endsection
