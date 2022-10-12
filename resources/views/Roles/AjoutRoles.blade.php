@extends('layouts.app')
@section('titre')
Ajout des roles
@endsection
@section('content')
<form  action="{{ route('SauverRoles') }}" class="rowwww" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="card rolecard">
        <h6 class="h6">Ajout des roles</h6>
    </div><br>
    @if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@elseif(session('error'))
<div class="alert alert-warning" role="alert">
    {{ session('error') }}
</div>
@endif
    <div class="col-auto">
      <div class="col-auto">
        <label for="inputPassword2" class="visually-hidden">Role</label>
        <input type="text" name="NomRole" class="form-control" id="inputPassword2"
          @error('NomRole') is-invalid @enderror placeholder="Ajouter un role">
          @error('NomRole')
          <span class="text-danger">{{ $message }}</span>
      @enderror
      </div><br>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
      </div>
  </form>
  <section class="container Roleslist">
    <div class="row">
       <div class="col-20 ">
           <div class="card-header headerRole">
               <h6 class="h6 h6role">Liste des roles</h6>
           </div>
           <table class="table">
              <thead>
                <tr>
                   <th data-sortable="true" data-field="id">Id</th>
                   <th data-sortable="true" data-field="Nom">Fonction</th>
                   <th data-sortable="true" data-field="Nom">Option</th>                 
                </tr>
              </thead>
              <tbody>
                @if (is_countable($roles) && count($roles) != 0)
                @foreach ($roles as $anjara)
                <tr>
                  <th>{{ $anjara->id}}</th>
                  <th>{{$anjara->Type_Role}}</th>
                  <th><strong><button 
                    type="submit" class="btn btn-success container widthBtnRole">
                      Modifier</button></strong></th>
                  <th><strong><button 
                      type="submit" class="btn btn-danger container widthBtnRole">
                        Supprimer</button></strong></th>
                 @endforeach
                 @endif
                        
                               </th>
                         </tr>
                   
               </tr>
              </tbody>
           </table>
           <div class="pagination-block homepagination">
               {{ $roles->links('layouts.paginationlinks') }}
           </div>
       </div>
    </div>
  </section>
@endsection