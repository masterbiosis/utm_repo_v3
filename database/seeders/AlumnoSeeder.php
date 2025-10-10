<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumno = new Alumno();
        $alumno->matricula = 'UTM123456TIM';
        $alumno->nombre = 'Julio César';
        $alumno->apellidop = 'Correa';
        $alumno->apellidom = 'Torres';
        $alumno->email = 'julio.correa.777@gmail.com';
        $alumno->telefono = '4431920548';
        $alumno->save();
    }
}
