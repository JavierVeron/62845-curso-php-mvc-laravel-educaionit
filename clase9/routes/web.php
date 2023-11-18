<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/persona/{id}', [PersonaController::class, 'getPersona']);
Route::get('/categoria/{id}', [CategoriaController::class, 'getCategoria']);
Route::get('/categorias', [CategoriaController::class, 'getCategorias']);
Route::get('/producto/{id}', [ProductoController::class, 'getProducto']);
