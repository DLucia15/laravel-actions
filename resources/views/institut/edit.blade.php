@extends('layouts.master')

@section('titulo')
    Edit student
@endsection

@section('contenido')
    <div class="card mt-3 w-50 mx-auto">
        <h1 class="card-header">Edit student</h1>
        <form action="{{route('update', ['id'=>$student->id])}}" method="POST" class="card-body">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input class="form-control" type="text" name="name" value="{{$student->name}}">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input class="form-control" type="text" name="email" value="{{$student->email}}">
            </div>
            <div class="form-group mb-3">
                <label for="address">Address:</label>
                <input class="form-control" type="text" name="address" value="{{$student->address}}">
            </div>
            <input class="btn btn-primary" type="submit" value="Update">
        </form>
    </div>
@endsection