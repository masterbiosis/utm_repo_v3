<?php

namespace Database\Seeders;

use App\Models\Directortesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectortesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directortesi = new Directortesi();
        $directortesi->nombre = 'No asignado';
        $directortesi->apellidop = 'na';
        $directortesi->apellidom = 'na';
        $directortesi->ultimoGradoEstudio = 'na';
        $directortesi->siglasEstudio='na';
        $directortesi->telefono = '0000000000';
        $directortesi->email = 'noasignado@correo.com';
        $directortesi->save();

        $directortesi = new Directortesi();
        $directortesi->nombre = 'María Elena';
        $directortesi->apellidop = 'Benítez';
        $directortesi->apellidom = 'Ramírez';
        $directortesi->ultimoGradoEstudio = 'Maestría en Gestión de Tecnologías de la Información.';
        $directortesi->siglasEstudio='MGTI';
        $directortesi->telefono = '443 190 4795';
        $directortesi->email = 'elena.benitez@ut-morelia.edu.mx';
        $directortesi->save();

        $directortesi = new Directortesi();
        $directortesi->nombre = 'José luis';
        $directortesi->apellidop = 'Cendejas';
        $directortesi->apellidom = 'Valdez';
        $directortesi->ultimoGradoEstudio = 'Doctorado';
        $directortesi->siglasEstudio='Dr';
        $directortesi->telefono = '4433449988';
        $directortesi->email = 'jose.cendejas@ut-morelia.edu.mx';
        $directortesi->save();
    }
}
