@extends('layouts.main')

@section('title', 'Tabela')

@section('content')

    <div class="row-lg-12">
        <table class="table table-striped table-bordered table-hover">
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
                <tr style="font-size: 15px;">
                    <td>{{ $key["id"]       }}</td>
                    <td>{{ $key["sensor"]   }}</td>
                    <td>{{ $key["data"]     }}</td>
                    <td>{{ $key["valor"]    }}</td>
                    <td>{{ $key["qualidade"]}}</td>
                    <td>{{ $key["intervalo"]}}</td>
                    <td>{{ $key["estacao"]  }}</td>
                </tr>
            @endforeach
        </table>
        <div>
            <br><i>TOTAL DE PÁGINAS: </i> {{ $json['data']['total_pages'] }}
            <br><i>TOTAL DE RESULTADOS: </i> {{ $json['data']['total_results'] }}
            </tr>
        </div>
    </div>
@endsection
