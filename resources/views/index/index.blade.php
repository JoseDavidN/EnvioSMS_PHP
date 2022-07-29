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
    <div class="col" id="content">
        <form action="/home" method="post" enctype="multipart/form-data">
            @csrf
            @include('partials.message')
            <div class="mb-2">
                <h6>Filtrar envio:</h6>
            </div>
            <div class="mb-3 check-form">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="filtroOption" id="filtroOption1" value="Si">
                    <label class="form-check-label" for="filtroOption1">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="filtroOption" id="filtroOption2" checked value="No">
                    <label class="form-check-label" for="filtroOption2">
                        No
                    </label>
                </div>
            </div>
            <div class="mb-3 filtro">
                <label for="filtro" class="form-label">Enviar a:</label>
                <input type="text" class="form-control" id="filtro" name="filtro">
            </div>
            <div class="mb-2">
                <h6>Incluir nombre en el mensaje:</h6>
            </div>
            <div class="mb-3 check-form">
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
            </div>
            <div class="mb-2">
                <h6>Tipo de mensaje:</h6>
            </div>
            <div class="mb-3 check-form">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo" id="tipo1" checked value="sms">
                    <label class="form-check-label" for="tipo1">
                        SMS
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo" id="tipo2" value="whatsapp">
                    <label class="form-check-label" for="tipo2">
                        Whatsapp
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Escribe tu mensaje:</label>
                <textarea class="form-control" id="mensaje" rows="2" name="mensaje" required></textarea>
            </div>
            <button class="btn"><a href="/cargar">Cargar Archivos</a></button>
            <button type="submit" class="btn" id="envio">Enviar</button>
        </form>
    </div>
@endsection