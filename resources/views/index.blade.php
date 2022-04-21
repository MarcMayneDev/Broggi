@extends('layouts.master')

@section('logo_title')
    <link rel="icon" href="{{ asset('img/broggi_title.jpg') }}" type="image/png">
@endsection

@section('title')
    IES Broggi
@endsection

@section('css')
    <link href="css/index.css" rel="stylesheet">
@endsection

@section('main')
    <section class="text-center w-100">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/ambulancia.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                <img src="img/agente.jpg" height="" class="d-block w-100">
                </div>
                <div class="carousel-item">
                <img src="img/emergencias.jpg" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col m-3 d-flex justify-content-center">
                <img src="img/Marc.jpg" width="200">
            </div>
            <div class="col m-3">
                Buenas, soy Marc Martínez Mayné, estudiante de DAW y futuro Web Developer<br>Adjunto mis redes de contacto y mis trabajos:
                <div class="col m-4">
                    <a href="https://github.com/marcmaynedev" role="button" class="me-2">
                        <img src="{{ asset('img/iconos/github.png') }}" width="50px">
                    </a>
                    <a href="mailto:marcmartinez2001@gmail.com" role="button" class="me-2">
                        <img src="{{ asset('img/iconos/email_dark.png') }}" width="50px">
                    </a>
                    <a href="https://discordapp.com/users/219575822896463872" role="button">
                        <img src="{{ asset('img/iconos/discord.png') }}" width="50px">
                    </a>
                </div>
            </div>
            <div class="col m-3">
                Hola, me llamo Johnny Bermúdez y estoy estudiando DAW en el Centre d'Estudis Politècnics.<br>Visita mis redes sociales.
                <div class="col m-3">
                    <a href="https://github.com/johnnydaw2a" role="button" class="me-2">
                        <img src="{{ asset('img/iconos/github.png') }}" width="50px">
                    </a>
                    <a href="mailto:johnny.sbsoria@gmail.com" role="button" class="me-2">
                        <img src="{{ asset('img/iconos/email_dark.png') }}" width="50px">
                    </a>
                    <a href="https://discordapp.com/users/410852547935600640" role="button">
                        <img src="{{ asset('img/iconos/discord.png') }}" width="50px">
                    </a>
                </div>
            </div>
            <div class="col m-3 d-flex justify-content-center">
                <img src="img/Johnny.png" width="200">
            </div>
        </div>
    </div>
@endsection
