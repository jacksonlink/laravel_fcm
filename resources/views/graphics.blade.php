@extends('layouts.main')

@section('title', 'Gráficos')

@section('content')

    <div class="row-lg-12">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
        <br>
        <p class="text-muted">
            Gráfico referente a busca pela data {{ \Carbon\Carbon::parse($datagte)->format('d/m/Y') }}, estação {{ $estacao }}, sensor {{ $sensor }}. 
        </p>
        <div style="height:85vh; width:70vw">
            <canvas id="canvas"></canvas>
        </div>
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
                    label: 'Valor',
                    data: valor,
                    backgroundColor: 'rgba(0, 150, 255, 0.4)',
                    borderColor: 'rgba(0, 150, 255)'
                }/*,{
                    label: 'Qualidade',
                    data: qualidade,
                    backgroundColor: 'rgba(255, 0, 0, 0.4)',
                    borderColor: 'rgba(255, 0, 150)'
                },{
                    label: 'Sensor',
                    data: sensor,
                    backgroundColor: 'rgba(0, 255, 0, 0.4)',
                    borderColor: 'rgba(150, 255, 0)'
                }*/]
            },
            options: {
                scales: {
                    xAxes:[{
                        display: true,
                        type: 'time',
                        time: {
                            displayFormats: {
                                'day': 'DD/MM/YYYY'
                            }
                        }
                    }]
                }
            }
        };
        var chart = new Chart(ctx, config);
    </script>
@endsection
