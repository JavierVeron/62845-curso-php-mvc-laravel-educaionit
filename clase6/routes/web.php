<?php

use App\Http\Controllers\McdonaldsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;

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
Route::get('/helpers', function () {
    $helpersPath = [
        'app_path' => app_path(),
        'base_path' => base_path(),
        'config_path' => config_path(),
        'database_path' => database_path(),
        'public_path' => public_path(),
        'resources_path' => resource_path(),
        'storage_path' => storage_path()
    ];

    return $helpersPath;
});
Route::get('/action', function () {
    $action = action('productosController@prueba', ['id' => 1]);

    return $action;
});
Route::get('/sesiones', function (Request $request) {
    session([
        'alumno1' => 'Camilo Gonzalez',
        'alumno2' => 'Pablo Fossa',
        'alumno3' => 'Claudio Rosas',
    ]);

    $alumno = session()->get('alumno3');
    //$alumno = session('alumno2');
    session()->put('alumno3', 'Alejandra Thiede');
    $alumno = session()->get('alumno3');
    session()->remove('alumno1');
    $alumno = session()->get('alumno1');
    session()->put('alumno4', 'Claudio Rosas');
    session()->push('alumnos', 'Claudio Rosas');
    session()->push('alumnos', 'Pepe Pompin');
    $alumnos = session()->pull('alumnos');
    session()->remove('alumnos');
    $data = $request->session()->all();

    return $data;
});
Route::get('/mcdonalds', function() {
    $productos = McdonaldsController::index();
    
    return view('mcdonalds', ['productos' => $productos]);
}); 
Route::get('/mcdonalds/{id}', [McdonaldsController::class, 'show']);
Route::post('/mcdonalds', [McdonaldsController::class, 'create']);
Route::delete('/mcdonalds/{id}', [McdonaldsController::class, 'delete']);