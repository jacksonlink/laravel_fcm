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
use App\Http\Controllers\AgendaController;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/tabela/{estacao}/{sensor}/{orderby}/{datagte}', 'App\Http\Controllers\TabulationController@index');

Route::get('/grafico/{estacao}/{sensor}/{orderby}/{datagte}', 'App\Http\Controllers\GraphicController@index');

Route::get('agenda', [AgendaController::class, 'index']);
//Route::get('/fullcalendar', 'App\Http\Controllers\FullCalenderController@index');

Route::post('/agendaAjax', 'App\Http\Controllers\AgendaController@ajax');
//Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);



