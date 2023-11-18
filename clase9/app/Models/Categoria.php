<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];

    public function productos() {
        return $this->hasMany(Producto::class, "categoria");
    }

    public function productosPremium() {
        return $this->hasMany(Producto::class, "categoria")->where("precio", ">=", 3500);
    }

    public function toArray() {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
            "productos" => $this->productos,
            //"productosPremium" => $this->productosPremium
        ];
        //return $this->nombre;
    }
}
