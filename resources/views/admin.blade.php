@extends('layouts.master')

@section('logo_title')
    <link rel="icon" href="img/broggi_title.jpg" type="image/png">
@endsection

@section('title')
    IES Broggi
@endsection

@section('css')
    <link href="../resources/css/index.css" rel="stylesheet">
@endsection

@section('main')
    <div class="container">
        <div class="d-flex justify-content-start">
            <h1 >Administración</h1>
        </div>
        <div class="d-flex justify-content-start">
            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#crearUsuario">Crear usuario</button>
        </div>
    </div>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">ID</th>
                            <th scope="col">Nombre de Usuario</th>
                            <th scope="col">Password</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Surname</th>
                            <th scope="col">PerfilsID</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id; }}</td>
                                <td>{{ $user->usuari; }}</td>
                                <td>{{ $user->contrassenya; }}</td>
                                <td>{{ $user->nom; }}</td>
                                <td>{{ $user->cognoms; }}</td>
                                <td>{{ $user->perfils_id; }}</td>
                                <td>
                                    {{-- <form action="editUserForm.php" method="POST">
                                        <button type="submit" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></button>
                                        <input type="hidden" name="id" value="{{  echo $user['id'] }}">
                                    </form> --}}
                                </td>
                                <td>
                                    <form action="{{ action([App\Http\Controllers\UserController::class, 'destroy'], ['user' =>$user->id])}}"  method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- MODAL CREAR USUARIO -->
    {{-- <div class="modal fade" id="crearUsuario" data-bs-keyboard="false" tabindex="-1" aria-labelledby="crearUsuarioModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearUsuarioModal">Crear nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ action([App\Http\Controllers\UserController::class, 'store']) }} " method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nombre" name="Nombre" placeholder="Nombre" aria-label="Nombre" required autofocus>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="apellido" name="Apellido" placeholder="Apellido" aria-label="Apellido" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="usuario" name="Usuario" placeholder="Usuario" aria-label="Usuario" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="Password" placeholder="Password" aria-label="Password" required>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" id="usertype" name="usertype" aria-label="usertype">
                                <option value="Operador" selected>Operador</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Crear usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
