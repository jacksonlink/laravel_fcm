<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;

class GraphicController extends Controller
{
    public function index($estacao, $sensor, $orderby, $datagte, $charttype){

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'http://apil5.funceme.br/rest/pcd/dado-sensor', [
            'json' => ['estacao' => $estacao, 'sensor' => $sensor, 'orderby' => $orderby, 'data-gte' => $datagte]
        ]);
        $res = $res->getBody();
        $array_data = json_decode($res, true);
        return view('graphics', [
            'json'      => $array_data,
            'estacao'   => $estacao,
            'sensor'    => $sensor,
            'orderby'   => $orderby,
            'datagte'   => $datagte,
            'charttype' => $charttype
        ]);
    }
}
