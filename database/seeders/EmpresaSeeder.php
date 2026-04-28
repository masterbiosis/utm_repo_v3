<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        'nombre',
        'direccion',
        'telefono',
        'email'
        */
        $empresa = new Empresa();
        $empresa->nombre = 'Universidad Tecnológica de Morelia';
        $empresa->direccion = 'Av, Vicepresidente # 750';
        $empresa->telefono = 4433112233;
        $empresa->email = 'utm@ut-morelia.edu.mx';
        $empresa->save();
    }
}
