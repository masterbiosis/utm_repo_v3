<?php

namespace Database\Seeders;

use App\Models\Programa;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
            $directortesi = new Directortesi();
            $directortesi->nombre = 'No asignado';
            $directortesi->apellidop = 'na';
            $directortesi->apellidom = 'na';
            $directortesi->telefono = '0000000000';
            $directortesi->email = 'noasignado@correo.com';
            $directortesi->save();
        */

        $programa = new Programa();
        $programa->nombre = 'Licenciatura en Ingeniería en Tecnologías de la Información e Innovación Digital';
        $programa->carrera_id = 1;
        $programa->save();

        $programa = new Programa();
        $programa->nombre = 'Técnico Superior Univaersitario en Tecnologías de la Información Área Desarrollo de Software Multiplataforma en Competencias Profesionales';
        $programa->carrera_id = 1;
        $programa->save();

        $programa = new Programa();
        $programa->nombre = 'Maestría en Ingeniería Aplicada a la Innovación Tecnológica';
        $programa->carrera_id = 1;
        $programa->save();

        $programa = new Programa();
        $programa->nombre = 'Maestría en Innovación en Tecnologías de la Información';
        $programa->carrera_id = 1;
        $programa->save();

    }
}
