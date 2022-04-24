@extends('layouts.master')

@section('logo_title')
    <link rel="icon" href="{{ asset('img/broggi_title.jpg') }}" type="image/png">
@endsection

@section('title')
    Login
@endsection

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('main')
    <div class="container login">
        <form action="{{ action([App\Http\Controllers\UserController::class, 'login']) }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="card text-center text-white logincard" style="width: 27rem;">
                    <h2 class="card-title mt-4">Iniciar sesión</h2>
                    <div class="card-body">
                        <div class="input-group mt-2 mb-3">
                            <input type="text" id="usuario" name="usuario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ old('usuario') }}" placeholder="Usuario">
                            <span class="input-group-text"><img src="img/iconos/user_dark.png" width="15px"></span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="contrasenya" name="contrasenya" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Contraseña">
                            <span class="input-group-text dark"><img src="img/iconos/passwd_dark.png" width="15px"></span>
                        </div>
                        <div class="registro mb-4 d-flex bd-highlight">
                            <div class="p-2 flex-fill bd-highlight d-grid col-4">
                                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
