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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/broggimain.png') }}" class="ms-2" width="180" height="60">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- Grafico -->
                            <li class="nav-item p-2">
                                <a class="nav-link" aria-current="page" href="{{ url('grafico') }}">
                                    <img src="{{ asset('img/iconos/grafico.png') }}" width="30px">
                                </a>
                            </li>
                            <!-- Carta Trucada -->
                            <li class="nav-item p-2">
                                <a class="nav-link" aria-current="page" href="{{ url('cartaTrucada/create') }}">
                                    <img src="{{ asset('img/iconos/carta.png') }}" width="30px">
                                </a>
                            </li>
                            <!-- Video -->
                            <li class="nav-item p-2">
                                <a class="nav-link" aria-current="page" href="#">
                                    <img src="{{ asset('img/iconos/info_blue.png') }}" width="30px">
                                </a>
                            </li>
                            <!-- Preguntas -->
                            <li class="nav-item dropstart p-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('img/iconos/help_blue.png') }}" width="30px">
                                </a>
                                <ul class="dropdown-menu p-4" aria-labelledby="navbarDropdown" style="width: 400px;">
                                    <p>
                                        <b>What's your emergency?</b><br>
                                        A traffic accident.<br>
                                        A sick person.<br>
                                        <b>What's the address of the emergency?</b><br>
                                        In a park.<br>
                                        In a square.<br>
                                        <b>What is the problem? What exactly happened?</b><br>
                                        There's been a traffic accident.<br>
                                        A person has collapsed.<br>
                                        <b>Are you alone?</b><br>
                                        Yes, I was alone when my car crashed.<br>
                                        No, I was with my sister when my car crashed.<br>
                                        <b>How old is the person?</b><br>
                                        My sister is 20 years old.<br>
                                        This person appears to be about 25 years old.<br>
                                        <b>Can you repeat it to make sure I have it correctly?</b><br>
                                        I was with my sister when my car crashed.<br>
                                        She is 20 years old.<br>
                                        <b>What is the phone number you are calling from?</b><br>
                                        My phone number is 612345789.
                                    </p>
                                </ul>
                            </li>
                            @if ($usertype === 3)
                                <li class="nav-item p-2">
                                    <a class="nav-link" href="admin">
                                        <img src="{{ asset('img/iconos/admin_blue.png') }}" width="30px">
                                    </a>
                                </li>
                            @endif
                            <!-- Idioma -->
                            <li class="nav-item dropdown p-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('img/iconos/lan_blue.png')}}" width="30px">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <form action="#" method="post">
                                            <input type="hidden" name="lang" value="es" />
                                            <button type="submit" class="dropdown-item" id="idioma"><img src="{{ asset('img/iconos/spanish.png') }}" width="30px"> Español</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="#" method="post">
                                            <input type="hidden" name="lang" value="ca" />
                                            <button type="submit" class="dropdown-item" id="idioma"><img src="{{ asset('img/iconos/catalonian.svg') }}" width="30px"> Català</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="#" method="post">
                                            <input type="hidden" name="lang" value="en" />
                                            <button type="submit" class="dropdown-item" id="idioma"><img src="{{ asset('img/iconos/english.png') }}" width="30px"> English</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- Login -->
                            <li class="nav-item dropdown p-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('img/iconos/user_blue.png') }}" width="30px">
                                </a>
                                @if (Auth::check())
                                    <ul class="dropdown-menu dropdown-menu-end  " aria-labelledby="navbarDropdownUser">
                                        <li>
                                            <a class="dropdown-item text-black font-weight-bold" href="{{ url('logout') }}">Logout</a>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="dropdown-menu dropdown-menu-end  " aria-labelledby="navbarDropdownUser">
                                        <li>
                                            <a href="{{ url('login') }}" class="align-items-center" style="text-decoration: none;">
                                                <strong>Iniciar sesión</strong>
                                            </a>
                                        </li>
                                        <hr>
                                        <li>
                                            <a href="{{ url('registro') }}" class="text-center" style="text-decoration: none;">
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
