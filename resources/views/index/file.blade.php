@extends('layouts.app')

@section('tittle')
    Cargar Archivos
@endsection

@section('header')
<div class="header">
        <h2>Cargar Archivos</h2>
    </div>
@endsection

@section('content')
    <div class="col-lg-6 info offset-lg-3 alert alert-info" id="info">
        <p>Cargaremos tu información a nuestra base de datos para facilitar el control de datos, pero no te preocupes una vez cierres sesión todos los datos serán borrados de nuestra base de datos.</p>
    </div>
    <div class="col-lg-6 info offset-lg-3 alert alert-warning">
        <p>Solo tu podrás usar los datos que cargues.</p>
    </div>
    <div class="col-lg-12 uploadFile">
        <form action="/cargar" method="post" enctype="multipart/form-data">
            @csrf
            @include('partials.message')
            <div class="mb-3">
                <label for="file" class="form-label"><i class="fa-solid fa-file-arrow-up"></i> <span>Cargar Excel</span></label>
                <input class="form-control" type="file" id="file" name="file">
            </div>
            <button type="submit" class="btn upload">Cargar</button>
            <button class="btn continue"><a href="/home">Continuar</a></button>
        </form>
    </div>
@endsection