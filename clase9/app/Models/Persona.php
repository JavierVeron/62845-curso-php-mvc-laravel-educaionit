<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'productos_id'];

    /* public function producto(){
        return $this->hasOne(Producto::class, "id", "productos_id");
    } */

    public function toArray() {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
            "producto" => $this->producto
        ];
    }
}
