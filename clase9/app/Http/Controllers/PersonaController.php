<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonaController extends Controller
{
    static public function getPersona($id) {
        $persona = Persona::find($id);

        return response()->json(["persona" => $persona], 200);
    }
}
