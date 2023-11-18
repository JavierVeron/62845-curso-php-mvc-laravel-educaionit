<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public static function getProducto($id) {
        $producto = Producto::find($id);

        return response()->json(["producto" => $producto], 200);
    }
}
