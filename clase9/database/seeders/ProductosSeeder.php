<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            'nombre' => 'Doble Cuarto de Libra con Queso',
            'descripcion' => 'Imaginá la sensación del clásico Cuarto de Libra. Imaginalo con un medallón de deliciosa carne 100% vacuna, queso cheddar, cebolla, kétchup y mostaza ¿Listo? Ahora duplicá esa sensación. Ya tenés el Doble Cuarto en la cabeza.',
            'precio' => 3000,
            'imagen' => 'https://cache-backend-mcd.mcdonaldscupones.com/media/image/product$kqXt7Sq2/200/200/original?country=ar',
            'categoria' => 1
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Big Mac',
            'descripcion' => 'Quizás sean las dos hamburguesas de carne 100% vacuna con esa salsa especial y queso derretido, el toque de cebolla y la frescura de la lechuga o el crocante del pepino, lo que la hace la hamburguesa más famosa del mundo. Un sabor único.',
            'precio' => 4000,
            'imagen' => 'https://cache-backend-mcd.mcdonaldscupones.com/media/image/product$kqX3vl0y/200/200/original?country=ar',
            'categoria' => 1
        ]);
        DB::table('productos')->insert([
            'nombre' => 'McNífica',
            'descripcion' => 'En un mundo donde todos buscan lo nuevo todo el tiempo, la McNífica viene a rectificar lo bueno de ser clásico. Carne, queso cheddar, tomate, lechuga y cebolla, acompañados de kétchup, mostaza y mayonesa.',
            'precio' => 3500,
            'imagen' => 'https://cache-backend-mcd.mcdonaldscupones.com/media/image/product$kqXXaUUP/200/200/original?country=ar',
            'categoria' => 1
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Papas pequeñas',
            'descripcion' => 'Calientes, crujientes y deliciosas, tus aliadas perfectas para cualquier comida. Disfrutá de nuestras papas mundialmente famosas, desde la primera hasta la última en su versión pequeña.',
            'precio' => 1500,
            'imagen' => 'https://cache-backend-mcd.mcdonaldscupones.com/media/image/product$kcXUUjwZ/200/200/original?country=ar',
            'categoria' => 2
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Papas Grandes',
            'descripcion' => 'Calientes, crujientes y deliciosas, tus aliadas perfectas para cualquier comida. Disfrutá de nuestras papas mundialmente famosas, desde la primera hasta la última.',
            'precio' => 2500,
            'imagen' => 'https://cache-backend-mcd.mcdonaldscupones.com/media/image/product$kcXXQgnB/200/200/original?country=ar',
            'categoria' => 2
        ]);
        DB::table('productos')->insert([
            'nombre' => 'McFlurry Oreo',
            'descripcion' => 'Un helado de vainilla que se banca compartir el protagonismo con trocitos de deliciosas galletitas Oreo y la salsa que elijas. Amalo hasta el final.',
            'precio' => 2000,
            'imagen' => 'https://cache-backend-mcd.mcdonaldscupones.com/media/image/product$kcX83hlT/200/200/original?country=ar',
            'categoria' => 3
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Sundae de Dulce de Leche',
            'descripcion' => 'El exquisito helado de vainilla que ya conoces y te encanta, pero bañado de una salsa de dulce de leche que te encantará aún más.',
            'precio' => 1500,
            'imagen' => 'https://cache-backend-mcd.mcdonaldscupones.com/media/image/product$sundae-dulce-de-leche.png/200/200/original?country=ar',
            'categoria' => 3
        ]);
    }
}
