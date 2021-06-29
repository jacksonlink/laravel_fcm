<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\GraphicController;

Route::get('/', 'App\Http\Controllers\TabulationController@index');

Route::get('/grafico/{estacao}/{sensor}/{orderby}/{datagte}', 'App\Http\Controllers\GraphicController@index');


Route::get('/teste', function () {
    $httpClient = app('GuzzleHttp\Client'); // ou app()->make('GuzzleHttp\Client').
    dd($httpClient);
});
