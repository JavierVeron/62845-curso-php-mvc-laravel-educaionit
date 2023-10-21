<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['cod_categoria' => 1, 'descripcion' => 'Televisores']);
        DB::table('categorias')->insert(['cod_categoria' => 2, 'descripcion' => 'Computadoras']);
        DB::table('categorias')->insert(['cod_categoria' => 3, 'descripcion' => 'Impresoras']);
        DB::table('categorias')->insert(['cod_categoria' => 4, 'descripcion' => 'Notebooks']);
        DB::table('categorias')->insert(['cod_categoria' => 5, 'descripcion' => 'Heladeras']);
        DB::table('categorias')->insert(['cod_categoria' => 6, 'descripcion' => 'Telefonos']);
        DB::table('categorias')->insert(['cod_categoria' => 7, 'descripcion' => 'Lavarropas']);
        DB::table('categorias')->insert(['cod_categoria' => 8, 'descripcion' => 'Camaras digitales']);
        DB::table('categorias')->insert(['cod_categoria' => 9, 'descripcion' => 'Video camaras']);
        DB::table('categorias')->insert(['cod_categoria' => 10, 'descripcion' => 'Estufas']);
        DB::table('categorias')->insert(['cod_categoria' => 11, 'descripcion' => 'Televisores']);
        DB::table('categorias')->insert(['cod_categoria' => 12, 'descripcion' => 'Aire acondicionado']);
        DB::table('categorias')->insert(['cod_categoria' => 13, 'descripcion' => 'Home Theater']);
    }
}