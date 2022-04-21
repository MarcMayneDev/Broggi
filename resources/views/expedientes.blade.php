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
<div class="container mt-3">
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead class="col-10">
                    <tr class="table-dark">
                        <th scope="col">Data Creacio</th>
                        <th scope="col">Data Ultima Modificacio</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="col-10">
                    @foreach ($expedients as $expedient)
                        <tr>
                            <td>{{ $expedient->data_creacio; }}</td>
                            <td>{{ $expedient->data_ultima_modificacio; }}</td>
                            @foreach($estats_expedients as $estat_expedient)
                                @if($estat_expedient->id == $expedient->estats_expedients_id)
                                    <td>{{ $estat_expedient->estat}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
