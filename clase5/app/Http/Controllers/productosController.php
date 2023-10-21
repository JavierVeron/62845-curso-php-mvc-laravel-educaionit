<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class productosController extends Controller
{
    static function list() {
        $productos = Productos::getAll();

        return $productos;
    }

    public function getProductosById(Request $request) {
        $productos = Productos::getById($request->id);

        return $productos;
    }

    public function getProductosByName(Request $request) {
        $productos = Productos::getByName($request->nombre);

        return $productos;
    }

    public function total() {
        $productos = Productos::getTotal();

        return $productos;
    }

    public function addProduct(Request $request) {
        try {
            $request->validate([
                'cod_categoria' => 'required|integer',
                'nombre' => 'required|unique:productos|max:300',
                'precio' => 'integer'
            ]);

            $resultado = Productos::insertProducto($request);

            return response()->json([
                'status' => 'ok',
                'msg'    => $resultado
            ], 201);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Error en la validación!',
                'errors' => $exception->errors(),
            ], 422);
        }
    }

    public function editProduct(Request $request) {
        try {
            $request->validate([
                'cod_categoria' => 'required|integer',
                'nombre' => 'required|max:300',
                'precio' => 'integer'
            ]);

            $resultado = Productos::updateProducto($request->id, $request);

            return response()->json([
                'status' => 'ok',
                'msg'    => $resultado
            ], 200);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Error en la validación!',
                'errors' => $exception->errors(),
            ], 422);
        }
    }

    public function deleteProduct(Request $request) {
        try {
            $resultado = Productos::deleteProducto($request->id);

            return response()->json([
                'status' => 'ok',
                'msg'    => $resultado
            ], 200);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Error en la validación!',
                'errors' => $exception->errors(),
            ], 422);
        }
    }
}
