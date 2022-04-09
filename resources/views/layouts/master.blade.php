<?php
    /**
     * MASTER FORM
     * Autor: Marc Martínez Mayné
     * Fecha: 14-03-2022
     */

    // Se inicia la session.
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Idioma por defecto de la web.
    if (!isset($_SESSION['language'])) {
        $_SESSION['language'] = "es";
    }

    if (Auth::user()) {
        $usertype = Auth::user()->perfils_id;
    } else {
        $usertype = 0;
    }
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['language'] ?>">
    <head>
        <!-- Web -->
        <meta charset="UTF-8">
        @yield('logo_title')
        <title>@yield('title')</title>
        @yield('css')
        <link rel="stylesheet" href="css/master.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body class="h-100" style="background-color: #A5B2F0">
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #263061;">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="index">
                        <img src="img/broggimain.png" class="ms-2" width="180" height="60">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- Carta Trucada -->
                            <li class="nav-item p-2">
                                <a class="nav-link" aria-current="page" href="cartaTrucada">
                                    Carta Trucada
                                </a>
                            </li>
                            <!-- Video -->
                            <li class="nav-item p-2">
                                <a class="nav-link" aria-current="page" href="#">
                                    <img src="img/iconos/info_blue.png" width="30px">
                                </a>
                            </li>
                            <!-- Preguntas -->
                            <li class="nav-item p-2">
                                <a class="nav-link" href="#">
                                    <img src="img/iconos/help_blue.png" width="30px">
                                </a>
                            </li>
                            @if ($usertype === 3)
                                <li class="nav-item p-2">
                                    <a class="nav-link" href="admin">
                                        <img src="img/iconos/admin_blue.png" width="30px">
                                    </a>
                                </li>
                            @endif
                            <!-- Idioma -->
                            <li class="nav-item dropdown p-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/iconos/lan_blue.png" width="30px">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <form action="#" method="post">
                                            <input type="hidden" name="lang" value="es" />
                                            <button type="submit" class="dropdown-item" id="idioma"><img src="img/iconos/spanish.png" width="30px"> Español</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="#" method="post">
                                            <input type="hidden" name="lang" value="ca" />
                                            <button type="submit" class="dropdown-item" id="idioma"><img src="img/iconos/catalonian.svg" width="30px"> Català</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="#" method="post">
                                            <input type="hidden" name="lang" value="en" />
                                            <button type="submit" class="dropdown-item" id="idioma"><img src="img/iconos/english.png" width="30px"> English</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- Login -->
                            <li class="nav-item dropdown p-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/iconos/user_blue.png" width="30px">
                                </a>
                                @if (Auth::check())
                                    <ul class="dropdown-menu dropdown-menu-end  " aria-labelledby="navbarDropdownUser">
                                        <li>
                                            <a class="dropdown-item text-black font-weight-bold" href="logout">Logout</a>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="dropdown-menu dropdown-menu-end  " aria-labelledby="navbarDropdownUser">
                                        <li>
                                            <a href="login" class="align-items-center" style="text-decoration: none;">
                                                <strong>Iniciar sesión</strong>
                                            </a>
                                        </li>
                                        <hr>
                                        <li>
                                            <a href="registro" class="text-center" style="text-decoration: none;">
                                                Crear una cuenta
                                            </a>
                                        </li>
                                    </ul>
                                @endif

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @yield('main')
    </body>
</html>
