@extends('layouts.app')
@section('titre')
    Page d'accueil
@endsection
@section('content')
<br>
<br>
<br>
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Prenom</th>
            <th>Photo</th>
        </tr>
    </thead>
    <tbody>
        @if (is_countable($Employer) && count($Employer) != 0)
        @foreach ($employer as $mpiasa)
        <tr>
            <td>{{ $mpiasa->id}}</td>
            <td>{{ $mpiasa->Prenom}}</td>
            <td>{{ $mpiasa->Profil}}</td>
        </tr>
            
        @endforeach
        @endif
      
    </tbody>

</table>



@endsection
