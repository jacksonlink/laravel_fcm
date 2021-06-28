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

Route::get('/', [GraphicController::class, 'index']);

Route::get('/graficos', function () {
    return view('graphics');
});

Route::get('/graficos/{id}', function ($id = 1) {
    return view('graphic', ['id' => $id]);
});
