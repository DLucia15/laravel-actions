@extends('layouts.master')

@section('contenido')
@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h1>Edit "{{ $cicle->name }}"</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('updateCicle', ['id' => $cicle->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="code"><strong>Code:</strong></label>
                        <input type="text" id="code" name="code" class="form-control" value="{{ old('code', $cicle->code) }}" required></input>
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="name"><strong>Name:</strong></label>
                        <input type="text" id="name" name="name" class="form-control" 
                               value="{{ old('name', $cicle->name) }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="desc"><strong>Description:</strong></label>
                        <textarea id="desc" name="desc" class="form-control" required>{{ old('desc', $cicle->desc) }}</textarea>
                        @error('desc')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="courses"><strong>Courses:</strong></label>
                        <input type="text" id="courses" name="courses" class="form-control" 
                               value="{{ old('courses', $cicle->courses) }}" required>
                        @error('courses')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image"><strong>Image:</strong></label>
                        <input type="text" id="image" name="image" class="form-control" 
                               value="{{ old('image', $cicle->image) }}" required>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="{{ route('mostrarCicles', ['id' => $cicle->id]) }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection