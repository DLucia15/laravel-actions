@extends('layouts.master')

@section('titulo')
    Dades de l'estudiant
@endsection

@section('contenido')
    <h2 class="text-center mt-4 fw-bold">Dades de l'alumne:</h2>
<div class="d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded" style="width: 24rem;">
        <div class="card-body text-center">
            <h4 class="card-title fw-bold">{{ $student->name }}</h4>
            <p class="card-text text-muted"><i class="bi bi-envelope"></i> {{ $student->email }}</p>
            <p class="card-text">{{ $student->address }}</p>
            @if ($student->cicle_id != null && Auth::user()->email == 'admin@admin.cat')
                <p class="card-text">Curs: {{ $student->cicle->name }}</p>
            @endif
        </div>
    </div>
</div>

@if (Auth::user()->email == $student->email && Auth::user()->student->cicle_id != null)
    <h2 class="text-center mt-4 fw-bold">El teu cicle formatiu:</h2>
    <div class="d-flex justify-content-center">
        <div class="card shadow-lg border-0 rounded overflow-hidden" style="width: 400px;">
            <img src="{{ asset(Auth::user()->student->cicle->image) }}" alt="Course image" class="card-img-top" style="height: 180px; object-fit: cover;">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold">{{ Auth::user()->student->cicle->name }}</h5>
                <a href="{{route('mostrarCicles', Auth::user()->student->cicle_id)}}" class="btn btn-info me-2">
                    Veure
                </a>
            </div>
        </div>
    </div>
@endif
@endsection