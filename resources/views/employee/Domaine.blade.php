@extends('layouts.app')
@section('titre')
    Liste des domaines
@endsection
@section('content')
    <table class="table table-hover tableDomaine">
        <caption><h2>Liste des domaines</h2></caption>
        <caption>Il y a {{ $CountDomaine}} Domaines</caption>
        <thead>
            <tr class="table-warning">
                <th scope="col">Nom du domaine</th>
                <th>Effectif des employés pour chaque domaine</th>
               <center>
                <th scope="col" class="optionss">Options</th>
                <th scope="col"></th>
               </center>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                      @if (session('status'))
                        <div class="alert alert-success container" role="alert">
                            {{ session('status') }}
                        </div>
                       @endif
                </td>
            </tr>
            {{-- @foreach ( $listedomaines->employees as $employee)
              {{ $employee->Nom}}
            @endforeach    --}}
            @foreach ($listedomaine as $listdomain)
            <tr>     
                    <td>{{ $listdomain->NomDomaine }}</td>
                    <td><center>{{ $listdomain->employees_count }}</center></td>
                    <td>
                        <button type="button"  data-toggle="modal" data-target="{{'#ModifDomaine'. $listdomain->id}}" class="btn btn-success">
                            Modifier</button>

                            <div class="modal fade" id="{{'ModifDomaine'. $listdomain->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
                                <div class="modal-dialog modal-dialog-centered">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modification d'un domaine</h5>
                                           <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                 <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
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
                    </td>
                    <td><button type="button" class="btn btn-danger">Supprimer</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-block homepagination">
        {{ $listedomaine->links('layouts.paginationlinks') }}
    </div>
@endsection
