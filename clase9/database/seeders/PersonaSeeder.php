<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personas')->insert([
            'nombre' => 'Claudio Rosas',
            'productos_id' => 6
        ]);
        DB::table('personas')->insert([
            'nombre' => 'Camilo Gonzalez',
            'productos_id' => 1
        ]);
        DB::table('personas')->insert([
            'nombre' => 'Alejandra Thiede',
            'productos_id' => 3
        ]);
        DB::table('personas')->insert([
            'nombre' => 'Daniel Sirerol',
            'productos_id' => 4
        ]);
        DB::table('personas')->insert([
            'nombre' => 'Javier Verón',
            'productos_id' => 7
        ]);
    }
}
