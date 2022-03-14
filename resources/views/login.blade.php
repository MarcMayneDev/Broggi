@extends('layouts.master')

@section('logo_title')
    <link rel="icon" href="img/broggi_title.jpg" type="image/png">
@endsection

@section('title')
    Login
@endsection

@section('main')
    <div class="container mt-5">
        <form action="#" method="POST">
            <div class="row justify-content-center">
                <div class="card text-center text-white bg-dark" style="width: 27rem;">
                    <h2 class="card-title mt-4">Iniciar sesión</h2>
                    <div class="card-body">
                        <div class="input-group mt-2 mb-3">
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Correo">
                            <span class="input-group-text">📧</span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Contraseña">
                            <span class="input-group-text">🔒</span>
                        </div>
                        <div class="registro mb-4 d-flex bd-highlight">
                            <div class="p-2 flex-fill bd-highlight align-self-center">
                                ¿No tienes cuenta?&nbsp;<a href="#" class="text-warning change_link">Regístrate</a>
                            </div>
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
