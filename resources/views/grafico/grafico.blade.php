@extends('layouts.master')

@section('logo_title')
    <link rel="icon" href="{{ asset('img/broggi_title.jpg') }}" type="image/png">
@endsection

@section('title')
    IES Broggi
@endsection

@section('css')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endsection

@section('main')

<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    let comarques = {!! json_encode($comarques->toArray(), JSON_HEX_TAG) !!};

    const provincies = {
        1: "Barcelona",
        2: "Girona",
        3: "Lleida",
        4: "Tarragona",
    };
    const provinciesCount = comarques.reduce((previous, comarca) => {
        const currentProvincia = provincies[comarca.provincies_id];

        if (!previous[currentProvincia]) {
            previous[currentProvincia] = 0;
        }
        previous[currentProvincia]++;
        return previous;
    }, {});

    const entries = [["Provincia", "Count"], ...Object.entries(provinciesCount)];

    const obj1 = {nom: "MARc", cognom: "Martínez"}
    const obj2 = {nom: "Adrià", edad: 12}

    const obj3 = {obj1, ...obj2}

    {nom: "Adrià", cognom: "Martínez",  edad: 12}

    // Draw the chart and set the chart values
    function drawChart() {
        let data = google.visualization.arrayToDataTable(entries);

        // Optional; add a title and set the width and height of the chart
        let options = {'title':'My Average Day', 'width':550, 'height':400};

        // Display the chart inside the <div> element with id="piechart"
        let chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>

<div id="piechart"></div>
    {{-- <script src="{{ asset('js/events/graficos/usuarios/userGraphic.js') }}"></script> --}}
@endsection
