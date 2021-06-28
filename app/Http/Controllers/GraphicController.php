<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use GuzzleHttp\Client;

class GraphicController extends Controller
{
    public function index(){

        $letras = ['A', 'B', 'C', 'D', 'E'];
        $numeros = ['1', '2', '3', '4', '5'];

        //return view('welcome');
        //return view('welcome', ['letras' => $letras, 'numenros' => $numeros]);

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'http://apil5.funceme.br/rest/pcd/dado-sensor', [
            'json' => ['estacao' => '375', 'sensor' => '22', 'orderby' => 'data,desc', 'data-gte' => '2010-01-01']
        ]);
        //echo $res->getStatusCode();
        //echo $res->getHeader('content-type')[0];
        $res = $res->getBody();
        $array_data = json_decode($res, true);
        return view('welcome', ['json' => $array_data]);
    }
}
