@extends('layouts.master')

@section('titulo')
    Crear estudiant
@endsection

@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card mt-3 w-50 mx-auto">
    <h1 class="card-header">Create a new student</h1>
    <form class="card-body" action="{{route('store')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Introduce your name">
        </div><div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Introduce your email">
        </div><div class="form-group mb-3">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Introduce your address">
        </div>
        <input type="submit" class="btn btn-primary" value="Create">
    </form>
</div>
    
@endsection