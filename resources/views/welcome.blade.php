@extends('layouts.main')

@section('title', 'FUNCEME')

@section('content')

    <h1> RAÍZ </h1>
    <p>{{-- json_encode($json) --}}</p>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>SENSOR</th>
            <th>DATA</th>
            <th>VALOR</th>
            <th>QUALIDADE</th>
            <th>INTERVALO</th>
            <th>ESTAÇÃO</th>
        </tr>

        @foreach($json['data']['list'] as $key)
            <tr>
                <td>{{ $key["id"]       }}</td>
                <td>{{ $key["sensor"]   }}</td>
                <td>{{ $key["data"]     }}</td>
                <td>{{ $key["valor"]    }}</td>
                <td>{{ $key["qualidade"]}}</td>
                <td>{{ $key["intervalo"]}}</td>
                <td>{{ $key["estacao"]  }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="7" style="color: white">.</td>
        </tr>
        <tr>
            <td colspan="5"> </td>
            <td><b>TOTAL DE PÁGINAS</b></th>
            <td><b>TOTAL DE RESULTADOS</b></th>
        </tr>
        <tr>
            <td colspan="5"> </td>
            <td>{{ $json['data']['total_pages'] }}</th>
            <td colspan="4">{{ $json['data']['total_results'] }}</th>
        </tr>
    </table>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <canvas id="canvas"></canvas>


    <script>

        var jsonfile = {
            "jsonarray": [{
                "name": "Joe",
                "age": 12
                }, {
                "name": "Tom",
                "age": 14
            }]
        };

        /*
        "list":[
         {
            "id":732343525,
            "sensor":"22",
            "data":"2010-01-01 12:00:00",
            "valor":"0.000",
            "qualidade":1,
            "intervalo":1440,
            "estacao":"375"
         }

*/
        var jsonfile = JSON.parse( {{ $json['data']['list'] }} );

        var labels = jsonfile.jsonarray.map(function(e) {
            return e.id;
        });
        var data = jsonfile.jsonarray.map(function(e) {
            return e.sensor;
        });;

        var ctx = canvas.getContext('2d');
        var config = {
            type: 'line',
            data: {
            labels: labels,
            datasets: [{
                label: 'Graph Line',
                data: data,
                backgroundColor: 'rgba(0, 119, 204, 0.3)'
            }]
            }
        };
        var chart = new Chart(ctx, config);
    </script>




@endsection
