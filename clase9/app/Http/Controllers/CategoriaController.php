<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class CategoriaController extends Controller
{
    public static function getCategoria($id) {
        $categoria = Categoria::find($id);

        return response()->json(["categoria" => $categoria], 200);
    }

    public static function getCategorias() {
        //$categorias = Categoria::all();
        
        //$categorias = Categoria::has('productos')->get(); // Categorías que al menos tienen 1 producto
        
        //$categorias = Categoria::has('productos', '>', 2)->get(); // Categorías que tienen más de 2 productos
        
        /* $categorias = Categoria::whereHas('productos', function (Builder $query) {
            $query->where('precio', '>=', 2500);
        })->get(); // Categorías que tienen productos mayores o igual a $2500 pesos */
        
        /* $categorias = Categoria::whereHas('productos', function (Builder $query) {
            $query->where('precio', '>=', 2500);
        }, ">", 1)->get(); // Categorías que tienen más de un producto mayores o igual a $2500 pesos */

        //$categorias = Categoria::doesntHave('productos')->get(); // Categorías que no tienen productos

        /* $categorias = Categoria::whereDoesntHave('productos', function (Builder $query) {
            $query->where('vegan', 0);
        })->get(); // Categorías donde sus productos sean veganos */

        $categorias = Categoria::withCount('productos')->get(); // Categorías con cantidad de productos
        $output = [];

        foreach ($categorias as $categoria) {
            $output[] = ["categoria" => $categoria, "cantidad" => $categoria->productos_count];
        }

        return response()->json(["categorias" => $output], 200);
    }
}
