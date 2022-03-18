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
@endsection