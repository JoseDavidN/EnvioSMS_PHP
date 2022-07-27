@extends('layouts.app')

@section('tittle')
    Envia Mensajes SMS
@endsection

@section('header') 
    <div class="header">
        <h2>Envia Mensajes SMS</h2>
    </div>
@endsection

@section('content')
    <div class="col">
        <form action="/home" method="post" enctype="multipart/form-data">
            @csrf
            @include('partials.message')
            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico de Altiria:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña de Altiria:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Escribe tu mensaje:</label>
                <textarea class="form-control" id="mensaje" rows="2" name="mensaje" required></textarea>
            </div>
            <div class="mb-3">
                <h6>Incluir nombre en el mensaje:</h6>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioOption" id="radioOption1" value="Si">
                <label class="form-check-label" for="radioOption1">
                    Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioOption" id="radioOption2" checked value="No">
                <label class="form-check-label" for="radioOption2">
                    No
                </label>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label"><i class="fa-solid fa-file-arrow-up"></i> <span>Cargar Excel</span></label>
                <input class="form-control" type="file" id="file" name="file">
            </div>
            <button type="submit" class="btn">Enviar</button>
        </form>
    </div>
@endsection