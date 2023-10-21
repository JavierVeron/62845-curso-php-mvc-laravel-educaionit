<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public static $productos = [
        0 => ["nombre" => "Coca Cola", "imagen" => "https://carrefourar.vtexassets.com/arquivos/ids/332148-170-170?v=638211437412370000&width=170&height=170&aspect=true", "precio" => 789],
        1 => ["nombre" => "Coca cola zero", "imagen" => "https://carrefourar.vtexassets.com/arquivos/ids/395286-1200-auto?v=638326494257370000&width=1200&height=auto&aspect=true", "precio" => 578],
        2 => ["nombre" => "Gaseosa Pepsi black", "imagen" => "https://carrefourar.vtexassets.com/arquivos/ids/191207-1200-auto?v=637511787821470000&width=1200&height=auto&aspect=true", "precio" => 347],
        3 => ["nombre" => "Gaseosa sin tacc Cunnington cola", "imagen" => "https://carrefourar.vtexassets.com/arquivos/ids/359527-1200-auto?v=638258156831630000&width=1200&height=auto&aspect=true", "precio" => 419.83]
    ];

    public static function getProductos() {
        return self::$productos;
    }

    public static function getProductosById($id) {
        if (array_key_exists($id, self::$productos)) {
            return self::$productos[$id];
        } else {
            return "Error! No se encuentra el ID de Producto especificado!";
        }
    }

    public static function agregarProducto(Request $request) {
        array_push(self::$productos, ["nombre" => $request["nombre"], "imagen" => $request["imagen"], "precio" => $request["precio"]]);

        return self::$productos;
    }

    public static function editarProductoById(Request $request, $id) {
        self::$productos[$id] = ["nombre" => $request["nombre"], "imagen" => $request["imagen"], "precio" => $request["precio"]];

        return self::$productos;
    }

    public static function eliminarProductoById($id) {
        $pos = array_search($id, array_keys(self::$productos));
        array_splice(self::$productos, $pos, 1);

        return self::$productos;
    }
}
