<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Subdirector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubdirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carrera = Carrera::first();

        $sub = new Subdirector();
        $sub->nombre = 'ITI. Luis Alberto';
        $sub->app = 'Gutiérrez';
        $sub->apm = 'Gracía';
        $sub->email = 'luis.alberto@ut-morelia.edu.mx';
        $sub->telefono = '1122334455';
        $sub->carrera_id = $carrera->id;
        $sub->save();
    }
}
