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
        <link rel="icon" href="" type="image/png">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body class="h-100">
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="img/broggimain.png" width="30" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <!-- Home -->
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <!-- Series -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Carta de Trucada</a>
                        </li>
                        <!-- About -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @yield('main')
    </body>
</html>