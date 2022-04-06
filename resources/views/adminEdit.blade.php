@extends('layouts.master')

@section('logo_title')
    <link rel="icon" href="img/broggi_title.jpg" type="image/png">
@endsection

@section('title')
    IES Broggi
@endsection

@section('css')
    
@endsection

@section('main')
<div class="container mt-3">
    <form action="{{ action([App\Http\Controllers\UserController::class, 'update']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ echo $user['id'] }} " readonly required>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="nombre" name="Nombre" placeholder="Nombre" value="{{ echo $user['nom'] }}" required autofocus>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="apellido" name="Apellido" placeholder="Apellido" value="{{ echo $user['cognoms'] }}" required>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="usuario" name="Usuario" placeholder="Usuario" value="{{ echo $user['usuari'] }}" required>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="Password" placeholder="Password" value="{{ echo $user['contrassenya'] }}" required>
        </div>
        <div class="input-group mb-3">
            <select class="form-select" id="curso" name="curso" aria-label="curso">
                <option selected value="{{ echo $user['perfil_id'] }}">{{ echo $user['perfil_id'] }}</option>
                <option value="1">Operador</option>
                <option value="2">Supervisor</option>
                <option value="3">Administrador</option>
            </select>
        </div>
        <a href="{{ action([App\Http\Controllers\UserController::class, 'index']) }}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary" id="submit" name="submit">Guardar cambios</button>
    </form>
</div>
@endsection
