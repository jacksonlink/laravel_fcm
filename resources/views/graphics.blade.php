@extends('layouts.main')

@section('title', 'Gráficos')

@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    
    <div style="height:85vh; width:80vw">
        <canvas id="canvas"></canvas>
    </div>

    <script>

        var jsonfile = @json($json['data']['list']);

        /*Eixo X */
        var labels = jsonfile.map(function(e) {
            return e.data.split(' ')[0];
        });

        /*Eixo Y */
        var valor = jsonfile.map(function(e) {
            return e.valor;
        });
        var sensor = jsonfile.map(function(e) {
            return e.sensor;
        });
        var qualidade = jsonfile.map(function(e) {
            return e.qualidade;
        });
        var intervalo = jsonfile.map(function(e) {
            return e.intervalo;
        });
        var estacao = jsonfile.map(function(e) {
            return e.estacao;
        });

        var ctx = canvas.getContext('2d');
        var config = {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Qualidade',
                    data: qualidade,
                    backgroundColor: 'rgba(255, 0, 0, 0.4)',
                    borderColor: 'rgba(255, 0, 150)'
                },{
                    label: 'Valor',
                    data: valor,
                    backgroundColor: 'rgba(0, 150, 255, 0.4)',
                    borderColor: 'rgba(0, 150, 255)'
                }, {
                    label: 'Sensor',
                    data: sensor,
                    backgroundColor: 'rgba(0, 255, 0, 0.4)',
                    borderColor: 'rgba(150, 255, 0)'
                }]
            }
        };
        var chart = new Chart(ctx, config);
    </script>
@endsection
