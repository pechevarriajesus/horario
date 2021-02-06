<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horarios')->insert([

            [
                'hora' => '8:00 - 8:45',
            ],

            [
                'hora' => '8:45 - 9:30',
            ],

            [
                'hora' => '9:30 - 10:15'
            ]

        ]);
    }
}
