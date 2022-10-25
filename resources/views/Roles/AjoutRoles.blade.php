@extends('layouts.app')
@section('titre')
Ajout des roles
@endsection
@section('content')
<form  action="{{ route('SauverRoles') }}" class="rowwww" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="card rolecard">
        <h6 class="h6">Ajout des fonctions <a href="" class="fa fa-add ajoutRole "></a></h6>
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
        <label for="inputPassword2" class="visually-hidden">Fonction</label>
        <input type="text" name="NomRole" class="form-control" id="inputPassword2"
          @error('NomRole') is-invalid @enderror placeholder="Ajouter une fonction">
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
           <div class="card-header">
               <h6 class="h6 h6role">Liste des fonctions </h6>
           </div>
           <table class="table">
              <thead>
                <tr>
                   {{-- <th data-sortable="true" data-field="id">Id</th> --}}
                   <th data-sortable="true" data-field="Nom">Fonction</th>
                   <th data-sortable="true" data-field="Nom"><center>Option</center></th>  
                   <th class="thh">Il y a ({{$RoleNombre}}) Fonctions</th>               
                </tr>
              </thead>
              <tbody>
                @if (is_countable($roles) && count($roles) != 0)
                @foreach ($roles as $anjara)
                <tr>
                    
                  {{-- <th>{{ $anjara->id}}</th> --}}
                  <th>{{$anjara->Type_Role}}</th>
                  {{-- <th>{{$anjara->employees->Nom}}</th> --}}
                  <th><strong><button data-toggle="modal" data-target="{{'#Modifier' . $anjara->id }}"
                    class="btn btn-success container widthBtnRole" type="button">
                      Modifier</button></strong>
                         {{-- modal modification --}}
                         <div class="modal fade" id="{{ 'Modifier' . $anjara->id  }}" 
                          tabindex="-1"
                          aria-hidden="true" data-backdrop="static"
                          data-keyboard="false"  role="dialog" aria-labelledby="ModifLabel">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header h1Role">
                                      <h1 class=""><strong>Modification  du role</strong></h1>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ url('/ModifierRole/' . $anjara->id) }}"
                                         method="POST" enctype="multipart/form-data">
                                         @csrf
                                         <input type="hidden" value="{{ $anjara->id }}">
                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="Nom"
                                                                            class="textLabel">Fonction</label>
                                                                        <input type="text" name="TypeRole"
                                                                            class="form-control "
                                                                            value="{{ $anjara->Type_Role }}"
                                                                            @error('TypeRole') is-invalid @enderror>
                                                                        @error('TypeRole')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                 </div>
                                  </div><br>
                                  <div class="modal-footer">
                                      <button class="btn btn-success"
                                          type="submit">Modifier</button>
  
                                      <button type="button" class="btn btn-warning"
                                          data-dismiss="modal">Annuler</button>
                                  </div>
                                </form>
                              </div>
                              {{-- fin --}}
                      
                    </th>
                  <th><strong><button data-toggle="modal" data-target="{{'#Supprimer' . $anjara->id }}"
                    type="button"  class="btn btn-danger container widthBtnRole">
                        Supprimer</button></strong>
                          
                         {{-- modal suppression --}}
                       <div class="modal fade" id="{{ 'Supprimer' . $anjara->id  }}" tabindex="-1"
                        role="dialog" aria-labelledby="SuppLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header supprimRoleHeader">
                                    <h1><strong>Suppression du role</strong></h1>
                                </div>
                                <div class="modal-body">
                                    Voulez vous Supprimer ce role??
                                </div>
                                <div class="modal-footer">

                                    <a class="btn btn-danger"
                                        href="/SupprimerRole/{{ $anjara->id }}">Oui</a>

                                    {{-- <a class="btn btn-danger" href="/Supprimer/{{$staff->id}}">Oui</a> --}}

                                    <button type="button" class="btn btn-warning"
                                        data-dismiss="modal">Non</button>
                                </div>
                            </div>
                            {{-- fin --}}
                      </th>
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