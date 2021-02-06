<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([

            [
                'nombre' => 'Comunicacion',
                'link' => 'https://us02web.zoom.us/w/83377717052?tk=406E5zq8Z86RgdwFPyW84OYM'
            ],

            [
                'nombre' => 'Matematica',
                'link' => 'https://us02web.zoom.us/w/83377717052?tk=406E5zq8Z86RgdwFPyW84OYM'
            ],

            [
                'nombre' => 'Teatro',
                'link' => 'https://us02web.zoom.us/w/83377717052?tk=406E5zq8Z86RgdwFPyW84OYM'
            ]

        ]);
    }
}
