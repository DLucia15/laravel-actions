@extends('layouts.master')

@section('titulo')
    High School
@endsection

@section('contenido')
@if(Auth::user()->email != 'admin@admin.cat' && Auth::user()->student->cicle_id != null)
    <h1 class="mt-3">Benvingut, {{strtoupper(Auth::user()->name)}}:</h1>
    <h2>El teu cicle formatiu:</h2>
    <div class="card shadow m-3" style="width: 400px;">
        <img src="{{ asset(Auth::user()->student->cicle->image) }}" alt="Course image" class="card-img-top" style="height: 150px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ Auth::user()->student->cicle->name }}</h5>
            <div class="d-flex justify-content-center">
                <a href="{{route('mostrarCicles', Auth::user()->student->cicle_id)}}" class="btn btn-info me-2">
                    Veure
                </a>
            </div>
        </div>
    </div>
@endif
@if(Auth::user()->email == 'admin@admin.cat' || Auth::user()->student->cicle_id == null)
<h1 class="text-center my-4">Cicles Disponibles:</h1>
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center">
                @foreach($cicles as $cicle)
                    <div class="card shadow m-3" style="width: 400px;">
                        <img src="{{ asset($cicle->image) }}" alt="Course image" class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cicle->name }}</h5>
                            <div class="d-flex justify-content-center">
                                <a href="{{route('mostrarCicles', $cicle->id)}}" class="btn btn-info me-2">
                                    Veure
                                </a>
                                @if(Auth::check() && Auth::user()->email == 'admin@admin.cat')
                                <a href="{{ route('editCicle', $cicle->id) }}" class="btn btn-warning me-2">
                                    Editar
                                </a>
                                <a href="{{ route('eliminarCicle', $cicle->id) }}" class="btn btn-danger me-2">
                                    Eliminar
                                </a>
                                @else
                                    @if (Auth::user()->student->cicle_id == null)
                                        <a href="{{ route('matricularCicle', $cicle->id) }}" class="btn btn-warning me-2 mt-2">
                                            Matricular-se
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endif
@if(Auth::check() && Auth::user()->email == 'admin@admin.cat')
<h1 class="mt-4 mb-2">Llista d'estudiants:</h1>   
    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Adreça</th>
                <th scope="col">Cicle</th>
                <th scope="col">Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $student)
                <tr>
                    @if ($student->cicle_id == null)
                        
                    @else
                    <th scope="row" class="bg-light">{{$student->id}}</th>
                    <td class="bg-light">{{$student->name}}</td>
                    <td class="bg-light">{{$student->email}}</td>
                    <td class="bg-light">{{$student->address}}</td>
                    <td class="bg-light">{{$student->cicle->code}}</td>
                    <td class="bg-light d-flex direction-column align-items-between">
                        <a type="button" href="{{url('/show/'.$student->id)}}" class="btn btn-info d-flex justify-content-center mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                        </a>
                        <a type="button" href="{{url('/edit/'.$student->id)}}" class="btn btn-warning d-flex justify-content-center mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </a>
                        <a type="button" href="{{url('/destroy/'.$student->id)}}" class="btn btn-danger d-flex justify-content-center mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </a>
                    </td>
                    @endif
                </tr> 
            @endforeach
    </tbody>
</table>
{{ $studentList->links() }}
<h1 class="mt-4 mb-2">Usuaris sense matricular:</h1>   
    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Adreça</th>
                <th scope="col">Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $student)
                <tr>
                    @if ($student->cicle_id == null)    
                    <th scope="row" class="bg-light">{{$student->id}}</th>
                    <td class="bg-light">{{$student->name}}</td>
                    <td class="bg-light">{{$student->email}}</td>
                    <td class="bg-light">{{$student->address}}</td>
                    <td class="bg-light d-flex direction-column align-items-between">
                        <a type="button" href="{{url('/show/'.$student->id)}}" class="btn btn-info d-flex justify-content-center mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                        </a>
                        <a type="button" href="{{url('/edit/'.$student->id)}}" class="btn btn-warning d-flex justify-content-center mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </a>
                        <a type="button" href="{{url('/destroy/'.$student->id)}}" class="btn btn-danger d-flex justify-content-center mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </a>
                    </td>
                    @else
                    @endif
                </tr> 
            @endforeach
    </tbody>
</table>
{{ $studentList->links() }}
@endif
@endsection