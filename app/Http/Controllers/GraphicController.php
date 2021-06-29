<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller\ApiFuncemeController;

class GraphicController extends Controller
{
    public function index($estacao, $sensor, $orderby, $datagte){

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'http://apil5.funceme.br/rest/pcd/dado-sensor', [
            'json' => ['estacao' => $estacao, 'sensor' => $sensor, 'orderby' => $orderby, 'data-gte' => $datagte]
        ]);
        $res = $res->getBody();
        $array_data = json_decode($res, true);
        $callApi = new App\Http\Controllers\Controller\ApiFuncemeController();
        $callApi($estacao, $sensor, $orderby, $datagte);
        return view('graphics', ['json' => $array_data]);
    }
}
