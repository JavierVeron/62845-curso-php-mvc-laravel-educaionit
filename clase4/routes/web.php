<?php

//use App\Http\Controllers\pepeController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
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

/* Route::get('/', function () {
    //return view('welcome');
    $pepe = new pepeController();
    return "Hola, soy " .$pepe->darNombre();
});
Route::get('/{nombre}', function ($nombre) {
    //return view('welcome');
    $pepe = new pepeController();
    return $pepe->verificarNombre($nombre);
});
Route::get('/saludar/nombre/{nombre}/apellido/{apellido}', function ($nombre, $apellido) {
    $nombreCompleto = $nombre ." " .$apellido;
    return view('saludar', ["nombreCompleto" => $nombreCompleto]);
}); */

// Desafío #1
Route::get('/', function () {
    return "<p>Hola Mundo!</p>";
});
Route::get('/productos', [HomeController::class, 'getProductos']);
Route::get('/productos/{id}', [HomeController::class, 'getProductosById']);
Route::post('/productos', [HomeController::class, 'agregarProducto']);
Route::put('/productos/{id}', [HomeController::class, 'editarProductoById']);
Route::delete('/productos/{id}', [HomeController::class, 'eliminarProductoById']);