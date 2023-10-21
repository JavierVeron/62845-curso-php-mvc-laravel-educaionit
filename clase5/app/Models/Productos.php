<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Productos extends Model
{
    use HasFactory;

    static function getAll() {
        //$productos = [0 => "Coca Cola", 1 => "Pepsi"]; // Array de Productos simple
        //$productos = DB::table('productos')->get(); // Consulta a la tabla productos, donde traigo todos los registros
        $productos = DB::table('productos')
        ->join('categorias', 'productos.cod_categoria', '=', 'categorias.cod_categoria')
        ->where('activo', 1)
        ->select('productos.cod_producto', 'productos.nombre', 'productos.precio', 'productos.stock', 'categorias.descripcion')
        ->get(); // Consulta a la tabla productos, donde traigo todos los registros

        return $productos;
    }

    static function getById($id) {
        $productos = DB::table('productos')
        ->where('cod_producto', $id)
        ->get();

        return $productos;

    }

    static function getByName($nombre) {
        $productos = DB::table('productos')
        ->where('nombre', 'LIKE', '%' .$nombre .'%')
        ->get();

        return $productos;

    }

    static function getTotal() {
        return DB::table('productos')->count();
    }

    static function insertProducto($data) {
        $resultado = DB::table('productos')->insert([
            'cod_categoria' => $data->cod_categoria,
            'nombre' => $data->nombre,
            'precio' => $data->precio,
            'stock' => isset($data->stock) ? $data->stock : 1 
        ]);

        return $resultado ? "Ok! El producto se almacenó correctamente!" : "Error! El producto no se almacenó correctamente!";
    }

    static function updateProducto($id, $data) {
        $resultado = DB::table('productos')
        ->where('cod_producto', $id)
        ->update([
            'cod_categoria' => $data->cod_categoria,
            'nombre' => $data->nombre,
            'precio' => $data->precio,
            'stock' => isset($data->stock) ? $data->stock : 1
        ]);

        return $resultado ? "Ok! El producto se actualizó correctamente!" : "Error! El producto no se actualizó correctamente!";
    }

    static function deleteProducto($id) {
        $resultado = DB::table('productos')
        ->where('cod_producto', $id)
        ->delete();

        return $resultado ? "Ok! El producto se eliminó correctamente!" : "Error! El producto no se eliminó correctamente!";
    }
}
