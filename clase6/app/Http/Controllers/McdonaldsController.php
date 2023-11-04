<?php

namespace App\Http\Controllers;

use App\Models\Mcdonalds;
use Illuminate\Http\Request;

class McdonaldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    static public function index()
    {
        return Mcdonalds::getAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    static public function create(Request $request)
    {
        $resultado = Mcdonalds::crear($request);

        return $resultado;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mcdonalds  $mcdonalds
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Mcdonalds::getById($id);
        //return Mcdonalds::primero();
        //return Mcdonalds::getByIdWithFail($id);
        //return Mcdonalds::maximo();
        //return Mcdonalds::precioPromedio();
        $min = $id;
        $max = $id + 1000;
        return Mcdonalds::rango($min, $max);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mcdonalds  $mcdonalds
     * @return \Illuminate\Http\Response
     */
    public function edit(Mcdonalds $mcdonalds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mcdonalds  $mcdonalds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mcdonalds $mcdonalds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mcdonalds  $mcdonalds
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return Mcdonalds::eliminar($id);
    }
}
