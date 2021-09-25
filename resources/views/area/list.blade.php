@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <a href="{{ route('area.form') }}" class="btn btn-primary">Nueva Área</a>
    </div>
</div>
@if(Session::has('message'))
    <p class="alert alert-success">
        {{ Session::get('message') }}
    </p>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Área</th>
        </tr>
    </thead>
    <tbody>
    @foreach($areas as $area)
        <tr>
            <td>{{ $area -> name }}</td>
            <td>
                <a href="{{ route('area.form',['id'=>$area->id]) }}"class="btn btn-warning">Editar</a>
                <a href="{{ route('area.delete',['id'=>$area->id]) }}"class="btn btn-danger">Borrar</a>
            </td>          
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
