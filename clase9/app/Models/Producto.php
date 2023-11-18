<?php

namespace App\Models;

use App\Models\Categoria;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen'];

    public function persona() {
        return $this->belongsTo(Persona::class, "id", "productos_id");
    }

    public function categoriaDatos() {
        return $this->belongsTo(Categoria::class, "categoria", "id");
    }
    
    public function toArray() {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "precio" => $this->precio,
            "imagen" => $this->imagen,
            /* "categoria" => $this->categoriaDatos,
            "persona" => $this->persona */
        ];
    }
}
