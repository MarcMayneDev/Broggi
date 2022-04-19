@extends('layouts.master')

@section('logo_title')
    <link rel="icon" href="{{ asset('img/broggi_title.jpg') }}" type="image/png">
@endsection

@section('title')
    IES Broggi
@endsection

@section('css')

@endsection

@section('main')
    <div class="container cartesTrucades">
        <form id="carta_trucada" action="#" method="post">
        @csrf
            <div class="" id="contador">
                00:00
            </div>
            <div class="input-group mb-3">
                <input type="datetime-local" class="form-control" id="data_hora" name="data_hora">
            </div>
            <div class="input-group mb-3">
                <input type="tel" class="form-control" id="telefon" name="telefon" placeholder="Telefon">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="procedencia_trucada" name="procedencia_trucada" placeholder="Procedencia trucada">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="origen_trucada" name="origen_trucada" placeholder="Origen trucada">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nom_trucada" name="nom_trucada" placeholder="Nom trucada">
            </div>
            <div class="input-group mb-3 text-dark">
                Fora de Catalunya? <input type="checkbox" name="fora_catalunya" id="fora_catalunya">
            </div>
            {{-- onSelect, llamar a funcion que calcule que mostrar --}}
            <div class="input-group mb-3">
                <select class="form-select" id="provincies_id" name="provincies_id" aria-label="provincies_id">
                    @foreach($provincies as $provincia)
                        <option value="{{ $provincia->id }}">{{ $provincia->id }}. {{ $provincia->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" id="comarques_id" name="comarques_id" aria-label="comarques_id">
                    @foreach($comarques as $comarca)
                        <option value="{{ $comarca->id }}" data-provincia="{{ $comarca->provincies_id }}">{{ $comarca->id }}. {{ $comarca->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" id="municipis_id" name="municipis_id" aria-label="municipis_id">
                    @foreach($municipis as $municipi)
                        <option value="{{ $municipi->id }}" data-comarca="{{ $municipi->comarques_id }}">{{ $municipi->id }}. {{ $municipi->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" id="tipus_localitzacions" name="tipus_localitzacions" aria-label="tipus_localitzacions">
                    @foreach($tipus_localitzacions as $tipus_localitzacio)
                        <option value="{{ $tipus_localitzacio->id }}">{{ $tipus_localitzacio->id }}. {{ $tipus_localitzacio->tipus}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <textarea form="carta_trucada" name="descripcio_localitzacio" id="descripcio_localitzacio" cols="200" rows="4" placeholder="Descripcio localització"></textarea>
            </div>
            <div class="input-group mb-3">
                <textarea form="carta_trucada" name="detall_localitzacio" id="detall_localitzacio" cols="200" rows="4" placeholder="Detall localització"></textarea>
            </div>
            <div class="input-group mb-3">
                <textarea form="carta_trucada" name="altres_ref_localitzacio" id="altres_ref_localitzacio" cols="200" rows="4" placeholder="Altres referencies localització"></textarea>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" id="incidents_id" name="incidents_id" aria-label="incidents_id">
                    @foreach($incidents as $incident)
                        <option value="{{ $incident->id }}">{{ $incident->codi }}. {{ $incident->descripcio}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" id="enviar" class="btn btn-success btn-sm">Enviar</button>
        </form>
    </div>

    <script>
        const contador = document.getElementById("contador");
        const enviar = document.getElementById("enviar");
        let tiempo = 0;
        const tiempollamada = setInterval(function () {
            ++tiempo;
            var minute = Math.floor((tiempo)/60);
            var seconds = tiempo - minute*60;
            if(minute < 10)
                minute = "0"+minute;
            if(seconds < 10)
                seconds = "0"+seconds;
                contador.innerHTML = minute + ":" + seconds;
        }, 950);

        enviar.addEventListener("click", function() {
            clearInterval(tiempollamada);
        })
    </script>
@endsection
