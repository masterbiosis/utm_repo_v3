<?php

namespace Database\Seeders;

use App\Models\linea;
use App\Models\Linea as ModelsLinea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
            $programa = new Programa();
            $programa->nombre = 'Maestría en Innovación en Tecnologías de la Información';
            $programa->carrera_id = 1;
            $programa->save();
        */

        $linea = new ModelsLinea();
        $linea->nombre='Cómputo en la nube';
        $linea->programa_id='4';
        $linea->descripcion='Sin descripción.';
        $linea->save();

        $linea = new ModelsLinea();
        $linea->nombre='Ciberseguridad';
        $linea->programa_id='4';
        $linea->descripcion='Sin descripción.';
        $linea->save();

        $linea = new ModelsLinea();
        $linea->nombre='Innovación tecnológica';
        $linea->programa_id='4';
        $linea->descripcion='Sin descripción.';
        $linea->save();

        $linea = new ModelsLinea();
        $linea->nombre='Automatización de procesos';
        $linea->programa_id='4';
        $linea->descripcion='Sin descripción.';
        $linea->save();

        $linea = new ModelsLinea();
        $linea->nombre='Gestión de Tecnologías de Información';
        $linea->programa_id='4';
        $linea->descripcion='Sin descripción.';
        $linea->save();

        $linea = new ModelsLinea();
        $linea->nombre='Industria 4.0 / 5.0 y Agroindustria 4.0 / 5.0';
        $linea->programa_id='4';
        $linea->descripcion='Sin descripción.';
        $linea->save();

    }
}
