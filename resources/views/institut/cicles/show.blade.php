@extends('layouts.master')

@section('titulo')
    {{$cicle->name}}
@endsection

@section('contenido')
<h2>{{ $cicle->name }}</h2>
<h4>{{ $cicle->desc }}</h4>
    <img src="{{asset($cicle->image)}}" alt="{{ $cicle->name }}" style="height: 250px;">
    <br>
    @if (Auth::user()->email != 'admin@admin.cat' && Auth::user()->student->cicle_id == null)
    <a href="{{ route('matricularCicle', $cicle->id) }}" class="btn btn-warning me-2 mt-2 mb-2">
        Matricular-se
    </a>
    @endif
    @if (Auth::user()->email == 'admin@admin.cat')
        <h2>Estudiants matriculats a aquest cicle:</h2>
        <table class="table table-bordered text-center align-middle mt-2">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Adreça</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cicle->student as $stu)
                <tr>
                    <th scope="row" class="bg-light">{{$stu->id}}</th>
                    <td class="bg-light">{{$stu->name}}</td>
                    <td class="bg-light">{{$stu->email}}</td>
                    <td class="bg-light">{{$stu->address}}</td>
                </tr> 
            @endforeach
    </tbody>
</table>
    @endif
@endsection