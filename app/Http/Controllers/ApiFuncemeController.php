<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use GuzzleHttp\Client;

class ApiFuncemeController extends Controller
{
    public function callApi($estacao, $sensor, $orderby, $datagte){

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'http://apil5.funceme.br/rest/pcd/dado-sensor', [
            'json' => ['estacao' => $estacao, 'sensor' => $sensor, 'orderby' => $orderby, 'data-gte' => $datagte]
        ]);
        $res = $res->getBody();
        $array_data = json_decode($res, true);
        return $array_data;
    }
}

