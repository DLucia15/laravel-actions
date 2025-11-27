@extends('layouts.master')

@section('titulo')
    Create a course
@endsection

@section('contenido')
<form class="card-body" action="{{route('guardarCicle')}}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="name">Nom:</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="form-group mb-3">
        <label for="code">Codi:</label>
        <input type="text" class="form-control" name="code" id="code">
    </div>
    <div class="form-group mb-3">
        <label for="desc">Descripció:</label>
        <input type="textarea" class="form-control" name="desc" id="desc" >
    </div>
    <div class="form-group mb-3">
        <label for="courses">Número de cursos:</label>
        <input type="text" class="form-control" name="courses" id="courses">
    </div>
    <div class="form-group mb-3">
        <label for="image">Imatge:</label>
        <input type="text" class="form-control" name="image" id="image">
    </div>
    <input type="submit" class="btn btn-primary" value="Crear">
</form>
@endsection
