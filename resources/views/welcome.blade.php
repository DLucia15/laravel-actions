@extends('layouts.master')

@section('titulo')
Under Field HS
@endsection

@section('contenido')
<div class="text-center my-4">
    <img src="https://cdn-icons-png.flaticon.com/512/195/195812.png" alt="Logo de l'Aplicació" class="img-fluid" style="max-width:150px;">
    <h1 class="mt-2">Benvingut a l'institut Under Field!</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <p class="lead">En el nostre centre, et formarem en el sector informàtic amb ensenyament de qualitat i tutorització professional!<br>Estem desitjant convertir-te en un gran professional!</p>
            <a href="{{ route('login') }}" class="btn btn-warning">Iniciar Sessió</a>
            </div>

            <div class="text-center mt-4">
                <p>No tens compte?</p>
                <a href="{{ route('register') }}" class="btn btn-secondary">Registrar-se</a>
            </div>
        </div>
    </div>
</div>
@endsection