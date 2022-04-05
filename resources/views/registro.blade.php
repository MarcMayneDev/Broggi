@extends('layouts.master')

@section('logo_title')
    <link rel="icon" href="img/broggi_title.jpg" type="image/png">
@endsection

@section('css')
    <link href="css/register.css" rel="stylesheet">
@endsection

@section('title')
    Registro
@endsection

@section('main')
    <div class="container registro">
        <form action="{{ action([App\Http\Controllers\UserController::class, 'store']) }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="card text-white registercard">
                    <h2 class="card-title mt-4 text-center">Registrarte</h2>
                    <div class="card-body text-justify">
                        <label class="form-label mt-2" for="usuario">Usuario</label>
                        <div class="input-group mb-2">
                            <input type="text" id="usuario" name="usuario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <span class="input-group-text"><img src="img/iconos/user_dark.png" width="15px"></span>
                        </div>
                        <label class="form-label mt-2">Nombre</label>
                        <div class="input-group mb-2">
                            <input type="text" id="nombre" name="nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
                            <span class="input-group-text"><img src="img/iconos/name_dark.png" width="15px"></span>
                        </div>
                        <label class="form-label mt-2">Apellidos</label>
                        <div class="input-group mb-2">
                            <input type="text" id="apellidos" name="apellidos" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <span class="input-group-text"><img src="img/iconos/name_dark.png" width="15px"></span>
                        </div>
                        <label class="form-label mt-2">Contraseña</label>
                        <div class="input-group mb-2">
                            <input type="password" id="contrasenya" name="contrasenya" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <span class="input-group-text dark"><img src="img/iconos/passwd_dark.png" width="15px"></span>
                        </div>
                        <div class="registro mt-3 mb-3 d-flex bd-highlight">
                            <div class="p-2 flex-fill bd-highlight align-self-center">
                                ¿Tienes cuenta? <a href="login" class="text-warning change_link">Inicia sesión</a>
                            </div>
                            <div class="p-2 flex-fill bd-highlight d-grid col-3">
                                <button type="submit" class="btn btn-primary">Crear cuenta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
