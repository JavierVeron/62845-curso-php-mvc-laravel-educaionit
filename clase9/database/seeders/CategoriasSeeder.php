<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'nombre' => 'Hamburguesas',
            'vegan' => 0
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Papas Fritas',
            'vegan' => 1
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Postres',
            'vegan' => 1
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Ensaladas',
            'vegan' => 1
        ]);
    }
}
