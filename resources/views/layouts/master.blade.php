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

?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['language'] ?>">
    <head>
        <!-- Web -->
        <meta charset="UTF-8">
        @yield('logo_title')
        <title>@yield('title')</title>
        @yield('css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body class="h-100">
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="#">
                        <img src="img/broggimain.png" class="ms-2" width="180" height="60">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- Video -->
                            <li class="nav-item p-2">
                                <a class="nav-link" aria-current="page" href="#">
                                    <img src="img/iconos/info_day.png" width="30px">
                                </a>
                            </li>
                            <!-- Preguntas -->
                            <li class="nav-item p-2">
                                <a class="nav-link" href="#">
                                    <img src="img/iconos/help_day.png" width="30px">
                                </a>
                            </li>
                            <!-- Idioma -->
                            <li class="nav-item dropdown p-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/iconos/lan_day.png" width="30px">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <img src="img/iconos/spanish.png" width="30px"> Español
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <img src="img/iconos/catalonian.svg" width="30px"> Catalán
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <img src="img/iconos/english.png" width="30px"> Inglés
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Login -->
                            <li class="nav-item p-2">
                                <a class="nav-link" href="#">
                                    <img src="img/iconos/user_day.png" width="30px">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @yield('main')
    </body>
</html>
