@extends('layouts.master')

@section('titulo')
    Available classes
@endsection

@section('contenido')
    <h2>Cicles Disponibles</h2>
    <div class="grid">
        @foreach($cicles as $cicle)
            <div class="cycle-card">
                <a href="{{ route('cycles.show', $cicle->id) }}">
                    <img src="{{$cicle->image}}" alt="{{ $cicle->name }}">
                    <h3>{{ $cicle->name }}</h3>
                </a>
            </div>
        @endforeach
    </div>
@endsection