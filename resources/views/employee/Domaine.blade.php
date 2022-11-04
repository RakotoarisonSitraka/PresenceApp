@extends('layouts.app')
@section('titre')
    Liste des domaines
@endsection
@section('content')
    <table class="table table-hover tableDomaine">
        <caption><h2>Liste des domaines <span class="spanBoutonListe"> <button data-toggle="modal" data-target="#staticBackdrop"
            type="button" class="btn btn-primary">
           Ajouter un domaine <i class="fa-sharp fa-solid fa-circle-plus"></i></button></span> <span class="spanList"> Il y a {{ $CountDomaine}} Domaines</span></h2></caption>
    
        <thead>
            <tr class="table-warning">
                <th scope="col">Nom du domaine</th>
                <th>Employés par domaine</th>
        
                <th>Projet par domaine</th>
                <th scope="col" class="optionss">Options</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
             
            </tr>
        </thead>
        <tbody>
             
            
            {{-- @foreach ( $listedomaines->employees as $employee)
              {{ $employee->Nom}}
            @endforeach    --}}
            @foreach ($listedomaine as $listdomain)
            <tr>     
                    <td>{{ $listdomain->NomDomaine }}</td>
                    <td><center>{{ $listdomain->employees_count }}</center></td>
                    <td><button type="button" class="btn btn-outline-primary">{{$listdomain->projets_count }} projets</button></td>
                    <td>
                        <button type="button"  data-toggle="modal" data-target="{{'#ModifDomaine'. $listdomain->id}}" class="btn btn-success">
                            Modifier <i class=" fa-solid fa-pen-clip"></i></button>

                            <div class="modal fade" id="{{'ModifDomaine'. $listdomain->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
                                <div class="modal-dialog modal-dialog-centered">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modification d'un domaine</h5>
                                           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                 <div class="modal-body">
                                        <form action="{{ url('/ModifierDomaine/' . $listdomain->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $listdomain->id }}">
                                          <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nom du domaine:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="NomDomaine" value="{{ $listdomain->NomDomaine }}" 
                                                    @error('NomDomaine') is-invalid @enderror>
                                                    @error('NomDomaine')
                                                      <span
                                                        class="text-danger">{{ $message }}</span>
                                                    @enderror
                                        
                                      </div>
                                   
                                 </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-success">Modifier <i class=" fa-solid fa-pen-clip"></i></button>
                             </div>
                            </form>
                           </div>
                    </td>
                    <td>
                        <button type="button"  data-toggle="modal" data-target="{{'#SupprimerDomaine'. $listdomain->id}}"  class="btn btn-danger">Supprimer <i class="fa-solid fa-trash"></i></button>
                                  {{-- modal suppression --}}
                                  <div class="modal fade" id="{{ 'SupprimerDomaine' . $listdomain->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="SuppLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            {{-- <div class="modal-header">
                                                <h1><strong> Suppression du domaine</strong></h1>
                                            </div> --}}
                                            <div class="modal-body">
                                              <h5> Voulez-vous supprimer le domaine <strong>{{ $listdomain->NomDomaine }}</strong>?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning"
                                                    data-dismiss="modal">Non <i class="fa-solid fa-xmark"></i></button>

                                                <a class="btn btn-danger"
                                                    href="/SupprimerDomaine/{{ $listdomain->id }}">Oui <i class="fa-solid fa-check"></i></a>

                                                {{-- <a class="btn btn-danger" href="/Supprimer/{{$staff->id}}">Oui</a> --}}

                                                
                                            </div>
                                        </div>
                                        {{-- fin --}}
                    </td>
                    <td></td>
                    <td></td>
            </tr>
            @endforeach
        </tbody>
            @if (session('status'))
            <caption class="alert alert-success divSuccess" role="alert">
                {{ session('status') }}
            </caption>
           @endif 

             {{-- modal domaine --}}
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajout d'un domaine</h5>
                   <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
         <div class="modal-body">
            <div class="modal-body">
                <form action="{{ route('InsertionDomaine') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nom du domaine:</label>
                    <input type="text" class="form-control" id="recipient-name" name="NomDomaine" 
                            @error('NomDomaine') is-invalid @enderror>
                            @error('NomDomaine')
                              <span
                                class="text-danger">{{ $message }}</span>
                            @enderror
                  </div>
                  {{-- <div class="mb-3">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div> --}}
               
              </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Ajouter <i class="fa-sharp fa-solid fa-circle-plus"></i></button>
     </div>
    </form>
   </div>
</div>
</div>
    </table>
   <center>
    <div class="pagination-block homepagination">
        {{ $listedomaine->links('layouts.paginationlinks') }}
    </div>
   </center>
   
@endsection
