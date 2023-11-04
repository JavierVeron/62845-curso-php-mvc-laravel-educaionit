<?php

namespace App\Models;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Mcdonalds extends Model
{
    use HasFactory;
    protected $table = 'mcdonalds';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen'];

    static public function crear(Request $request) {
        $datos = $request->all();
        $resultado = self::create([
            'nombre' => $datos["nombre"],
            'descripcion' => $datos["descripcion"],
            'precio' => $datos["precio"],
            'imagen' => $datos["imagen"]
        ]);
        
        if ($resultado) {
            return response()->json(["status" => "ok", "message" => "Se agregó correctamente el Producto con el Id #" .$resultado->id], 200);
        } else {
            return response()->json(["status" => "error", "message" => "Error! No se pudo agregar el Producto!"], 422);
        }
    }

    static public function getAll() {
        return self::all();
    }

    static public function getById($id) {
        return self::find($id);
    }

    static public function primero() {
        return self::first();
    }

    static public function getByIdWithFail($id) {
        try {
            return self::findOrFail($id);
        } catch (\Exception $exception) {
            return ["status" => "error", "message" => $exception, "detail" => "Error! No se encontró el producto con el Id #" .$id];
        }
    }

    static public function total() {
        return self::count();
    }

    static public function maximo() {
        return self::max('precio');
    }

    static public function precioPromedio() {
        return self::avg('precio');
    }

    static public function rango($precioMin, $precioMax) {
        return self::where('precio', '>=', $precioMin)
        ->where('precio', '<=', $precioMax)
        ->get();
    }

    static public function eliminar($id) {
        try {
            $producto = self::findOrFail($id);
            $producto->delete();

            return response()->json(["status" => "ok", "message" => "Se eliminó el producto con el Id #" .$id], 200);
        } catch (\Exception $exception) {
            return response()->json(["status" => "error", "message" => "Error! No se encontró el producto con el Id #" .$id], 422);
        }
    }
}
