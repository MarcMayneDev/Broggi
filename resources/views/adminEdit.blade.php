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
    <form action="{{ action([App\Http\Controllers\UserController::class, 'update'], [$user->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="id" name="id" placeholder="Id" value="{{ $user->id }} " readonly required>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nombre" value="{{ $user->nom }}" required autofocus>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="cognoms" name="cognoms" placeholder="Apellido" value="{{ $user->cognoms }}" required>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="usuari" name="usuari" placeholder="Usuario" value="{{ $user->usuari }}" required>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" id="contrassenya" name="contrassenya" placeholder="Password" value="{{ $user->contrassenya }}" required>
        </div>
        <div class="input-group mb-3">
            <select class="form-select" id="perfils_id" name="Perfils_id" aria-label="perfils_id">
                <option selected value="{{ $user->perfils_id }}">{{ $user->perfils_id }}</option>
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
