<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use GuzzleHttp\Client;

class GraphicController extends Controller
{
    public function index(){

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'http://apil5.funceme.br/rest/pcd/dado-sensor', [
            'json' => ['estacao' => '375', 'sensor' => '22', 'orderby' => 'data,desc', 'data-gte' => '2010-01-01']
        ]);

        $res = $res->getBody();
        $array_data = json_decode($res, true);
        return view('graphics', ['json' => $array_data]);
    }
}
