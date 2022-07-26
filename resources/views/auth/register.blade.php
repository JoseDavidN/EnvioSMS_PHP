@extends('layouts.app')

@section('tittle')
    Registrarse
@endsection

@section('header')
    <div class="header">
        <h2>Registro</h2>
    </div>
@endsection

@section('content')
    <div class="col">
        <form action="/register" method="post">
            @csrf
            @include('partials.message')
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electronico:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Repetir Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password_confirmation">
            </div>
            <button type="submit" class="btn">Registrarse</button>
        </form>
    </div>
@endsection