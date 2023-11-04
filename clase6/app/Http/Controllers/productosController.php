<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class productosController extends Controller
{
    static public function prueba($id) {
        return $id;
    }
    
    static public function agregar(Request $request) {
        try {
            $validacion = $request->validate([
                "nombre" => "required|string|min:3|max:20",
                "precio" => "required|integer|min:500|max:2000",
                "stock" => "max:10"
            ]);

            $datos["nombre"] = $request->input("nombre");
            $datos["precio"] = $request->input("precio");
            $datos["imagen"] = $request->input("imagen");
            $datos["stock"] = $request->input("stock") ? $request->input("stock") : 1;
    
           return response(["productos" => $datos], 200);
        } catch (ValidationException $exception) {
            return response(["error" => $exception->errors()], 422);
        }
    }

    static public function agregar2(Request $request) {
        $mensajes = [
            'required' => 'El campo :attribute es requerido.',
            'min' => 'El campo :attribute debe tener un mínimo de :min caracteres!',
            'max' => 'El campo :attribute debe tener un máximo de :max caracteres!',
            'precio.min' => "El valor del campo :attribute debe ser como mímino $:min!",
            'precio.max' => "El valor del campo :attribute debe ser como máximo $:max!",
         ];

        $validator = Validator::make($request->all(), [
            "nombre" => "required|string|min:3|max:20",
            "descripcion" => "max:500",
            "precio" => "required|integer|min:500|max:2000",
            "stock" => "max:10",
        ], $mensajes);
        Log::info("Se realizan validaciones de los datos.");
 
        if ($validator->fails()) {
            Log::error("Error de validación: " .$validator->errors());
            return view("producto", ["errors" => $validator->errors()]);
        }

        $datos["nombre"] = strtoupper($request->input("nombre"));
        $datos["descripcion"] = $request->input("descripcion");
        $datos["precio"] = $request->input("precio");
        $datos["imagen"] = $request->input("imagen");
        $datos["stock"] = $request->input("stock") ? $request->input("stock") : 1;
        Log::info("Se registraran los datos en la BD. => ", [$datos]);

        //Guardo los datos
        $idProducto = DB::table('productos')->insertGetId([
            'nombre' => $datos["nombre"],
            'descripcion' => $datos["descripcion"],
            'precio' => $datos["precio"],
            'imagen' => $datos["imagen"],
            'stock' => $datos["stock"]
        ]);

        Log::info("Se registró el producto con el Id #" .$idProducto);

        return view("producto", ["producto" => $datos]);
    }
}
