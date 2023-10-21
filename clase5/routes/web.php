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
Route::get('/productos', [productosController::class, 'list']);
Route::get('/productos/{id}', [productosController::class, 'getProductosById']);
Route::get('/productos/nombre/{nombre}', [productosController::class, 'getProductosByName']);
Route::get('/productos/total', [productosController::class, 'total']);
Route::post('/productos', [productosController::class, 'addProduct']);
Route::put('/productos/{id}', [productosController::class, 'editProduct']);
Route::delete('/productos/{id}', [productosController::class, 'deleteProduct']);
Route::get('/listar-productos', function () {
    $productos = productosController::list();

    return view('listar-productos', ["titulo" => "Lista de Productos!", "productos" => $productos]);
});
