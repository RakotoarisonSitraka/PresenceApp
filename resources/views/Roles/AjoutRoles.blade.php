@extends('layouts.app')
@section('titre')
Ajout des roles
@endsection
@section('content')
<form  action="{{ route('SauverRoles') }}" class="rowwww" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="card rolecard">
        <h6 class="h6">Ajout un role</h6>
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
@endsection