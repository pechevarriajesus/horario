<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semanas')->insert([

            [
                'id_horario' => 1,
                'id_curso' => 1,
                'dia_semana' => 'LUNES',
                'abrev' => 'L'
            ],

            [
                'id_horario' => 2,
                'id_curso' => 2,
                'dia_semana' => 'LUNES',
                'abrev' => 'L'
            ],

            [
                'id_horario' => 3,
                'id_curso' => 3,
                'dia_semana' => 'LUNES',
                'abrev' => 'L'
            ]

        ]);
    }
}
