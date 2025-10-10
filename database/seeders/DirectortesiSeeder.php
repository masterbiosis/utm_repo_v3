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
        $directortesi->telefono = '0000000000';
        $directortesi->email = 'noasignado@correo.com';
        $directortesi->save();

        $directortesi = new Directortesi();
        $directortesi->nombre = 'MGTI. María Elena';
        $directortesi->apellidop = 'Benítez';
        $directortesi->apellidom = 'Ramírez';
        $directortesi->telefono = '443 190 4795';
        $directortesi->email = 'elena.benitez@ut-morelia.edu.mx';
        $directortesi->save();
    }
}
