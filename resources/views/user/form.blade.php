@extends('layout')
@section('title',$user->id ? 'Actualizar Usuario' : 'Nuevo Usuario')
@section('header',$user->id ? 'Actualizar Usuario' : 'Nuevo Usuario')
@section('content')

<form action="{{ route('user.save') }}" method="post">
@csrf
<input type="hidden" name="id" value="{{ $user->id }}">
<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="{{ @old('name') ? @old('name') : $user->name }}">
    </div>
    @error('name')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
  </div>
  

  <div class="row mb-3">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <a href="/users" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
@endsection