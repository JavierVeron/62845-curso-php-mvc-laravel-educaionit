<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pepeController extends Controller
{
    private $nombre = "Pepe";

    public function darNombre() {
        return $this->nombre;
    }

    public function verificarNombre($nombre) {
        if ($this->nombre == $nombre) {
            return "Sí, soy Pepe!";
        } else {
            return "No, no soy Pepe!";
        }
    }
}
