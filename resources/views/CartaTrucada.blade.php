@extends('layouts.master')

@section('logo_title')
    <link rel="icon" href="img/broggi_title.jpg" type="image/png">
@endsection

@section('title')
    IES Broggi
@endsection

@section('css')

@endsection

@section('main')
    <div class="container cartesTrucades">
        <form action="{{ action([App\Http\Controllers\::class, '']) }}" method="post">

        </form>
    </div>
@endsection
