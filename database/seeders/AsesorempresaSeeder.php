<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asesorempresa;

class AsesorempresaSeeder extends Seeder
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
        $directortesi->ultimoGradoEstudio = 'na';
        $directortesi->siglasEstudio='na';
        $directortesi->telefono = '0000000000';
        $directortesi->email = 'noasignado@correo.com';
        $directortesi->save();
        */
        /*

        */
        $asesor_empresa = new Asesorempresa();
        $asesor_empresa->nombre='Luis Alberto';
        $asesor_empresa->app='Gutiérrez';
        $asesor_empresa->apm='García';
        $asesor_empresa->email='utm@ut-morelia.edu.mx';
        $asesor_empresa->telefono='luis.gutierrez@gmail.com';
        $asesor_empresa->empresa_id=1;
        $asesor_empresa->save();

    }
}
