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
                                <td>{{ $user->getId(); }}</td>
                                <td>{{ $user->getUsername(); }}</td>
                                <td>{{ $user->getPassword(); }}</td>
                                <td>{{ $user->getName(); }}</td>
                                <td>{{ $user->getSurname(); }}</td>
                                <td>{{ $user->getPerfilsId(); }}</td>
                                <td>
                                    <form action="editUserForm.php" method="POST">
                                        <button type="submit" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></button>
                                        <input type="hidden" name="id" value="{{  echo $user['ID_Usuarios'] }}">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ action([App\Http\Controllers\User::class, 'destroy'], ['id' =>$user->getId()])}}"  method="POST">
                                        @csrf
                                        @method('delete')
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
    <div class="modal fade" id="crearUsuario" data-bs-keyboard="false" tabindex="-1" aria-labelledby="crearUsuarioModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearUsuarioModal">Crear nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../controlers/createUser.php" method="POST" enctype="multipart/form-data">
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
                            <input type="email" class="form-control" id="correo" name="Correo" placeholder="Correo" aria-label="Usuario" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="Password" placeholder="Password" aria-label="Password" required>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" id="curso" name="curso" aria-label="curso">
                                <option selected>Cursos</option>
                                <option value="Grado medio sistemas microinformáticos y redes">Grado medio sistemas microinformáticos y redes</option>
                                <option value="Grado superior desarrollo aplicaciones web">Grado superior desarrollo aplicaciones web</option>
                                <option value="Grado superior desarrollo aplicaciones multiplataforma">Grado superior desarrollo aplicaciones multiplataforma</option>
                                <option value="Grado medio gestión administrativa">Grado medio gestión administrativa</option>
                                <option value="Grado superior administración y finanzas">Grado superior administración y finanzas</option>
                                <option value="Grado superior asistencia a la dirección">Grado superior asistencia a la dirección</option>
                                <option value="Grado medio actividades comerciales">Grado medio actividades comerciales</option>
                                <option value="Grado superior marketing y publicidad">Grado superior marketing y publicidad</option>
                                <option value="Grado superior gestión de ventas y espacios comerciales">Grado superior gestión de ventas y espacios comerciales</option>
                                <option value="Grado superior comercio internacional">Grado superior comercio internacional</option>
                                <option value="Grado superior agencias de viajes y gestión de eventos">Grado superior agencias de viajes y gestión de eventos</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input class="form-check-input" type="checkbox" id="Esadmin" name="Esadmin" value="0">
                            <label class="form-check-label" for="esAdmin">
                                &nbsp;Es Admin
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Crear usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
