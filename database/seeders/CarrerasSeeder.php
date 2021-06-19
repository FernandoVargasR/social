<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert(['clave'=>'INNI','carrera' => 'INGERIERIA INFORMATICA', ]);
        DB::table('carreras')->insert(['clave'=>'ICOM','carrera' => 'INGERIERIA EN COMPUTACION', ]);
        Carrera::create(['clave'=>'CEL', 'carrera' => 'LICENCIATURA EN INGENIERIA EN ELECTRONICA']);

    }
}
