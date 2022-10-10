@extends('layouts.app')
@section('titre')
    Liste d'administrateur
@endsection
@section('content')
   <section class="container">
     <div class="row">
        <div class="col-20 ContenuAdmin">
            <div class="card-header">
                <h6 class="h6">Liste d'Administrateurs</h6>
            </div>
            <table class="table">
               <thead>
                 <tr>
                    <th data-sortable="true" data-field="id">Identifiant</th>
                    <th data-sortable="true" data-field="Nom">Nom</th>
                    <th data-sortable="true" data-field="Nom">Role</th>
                    {{-- <th data-sortable="true" data-field="Nom">Nom</th> --}}
                 </tr>
               </thead>
               <tbody>
                {{-- @if (is_countable($Employes) && count($Employes) != 0)
                @foreach ($Employes as $staff)
                    <tr class="">
                        <td class="table-warning" id="td"><strong>{{ $staff->id }}</strong></td>
                <tr> --}}
                    <tr>
                        @if (session('status'))
                        <div class="alert alert-success container" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    </tr>
                  @if (is_countable($users) && count($users) != 0)
                      @foreach ($users as $Deba)
                          <tr>
                            <th>{{ $Deba->id}}</th>
                            <th>{{$Deba->name}}</th>
                            <th><strong><button 
                                type="" class="btn btn-success container">
                                  Admin</button></strong></th>
                            {{-- <th><strong><button data-toggle="modal" data-target="{{ '#SupprimUser' . $Deba->id }}"
                                type="button" class="btn btn-danger container">
                                  Supprimer</button></strong>

                                  <div class="modal fade" id="{{ 'SupprimUser' . $Deba->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="SuppLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1><strong>Suppression</strong></h1>
                                            </div>
                                            <div class="modal-body">
                                                Voulez vous vraiment le supprimer?
                                            </div>
                                            <div class="modal-footer">

                                                <a class="btn btn-danger"
                                                    href="/SupprimerUser/{{ $Deba->id}}">Oui</a> --}}

                                                {{-- <a class="btn btn-danger" href="/Supprimer/{{$staff->id}}">Oui</a> --}}

                                                {{-- <button type="button" class="btn btn-warning"
                                                    data-dismiss="modal">Non</button>
                                            </div>
                                        </div> --}}
                                        {{-- fin --}}
                                </th>
                          </tr>
                      @endforeach
                  @endif
                </tr>
               </tbody>
            </table>
            <div class="pagination-block homepagination">
                {{ $users->links('layouts.paginationlinks') }}
            </div>
        </div>
     </div>
   </section>

    
@endsection