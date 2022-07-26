@extends('layouts.app')

@section('tittle')
    Iniciar Sesion
@endsection

@section('header')
    <div class="header">
        <h2>Iniciar Sesion</h2>
    </div>
@endsection

@section('content')
    <div class="col">
        <form action="/login" method="post">
            @csrf
            @include('partials.message')
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn">Iniciar Sesion</button>
        </form>
    </div>
@endsection