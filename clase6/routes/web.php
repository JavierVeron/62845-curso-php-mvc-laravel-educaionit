<?php

use App\Http\Controllers\productosController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/nuevo', function () {
    return view('nuevo');
});

Route::get('/agregar', function() {
    return response('Para agregar un nuevo Producto, debes hacerlo con el método POST!', 200)
    ->header('Content-Type', 'text/plain');
});
/* Route::post('/agregar', function() {
    return redirect("/");
}); */
Route::post('/agregar', [productosController::class, 'agregar2']);
Route::get('/log', function () {
    $log = fopen("/xampp/htdocs/educacionit/62845/clase6/storage/logs/laravel.log", "r");
    return response($log)->header('Content-Type', 'text/plain');
});
