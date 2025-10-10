<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carrera = new Carrera();
        $carrera->nombre = 'Tecnologías de la Información';
        $carrera->save();
    }
}
