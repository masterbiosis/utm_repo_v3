<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /** @use HasFactory<\Database\Factories\EmpresaFactory> */
    use HasFactory;

    protected $fillable=[
        'nombre',
        'direccion',
        'telefono',
        'email'
    ];

    public function asesor(){
        return $this->hasMany('Asesor');
    }

    //Una empresa tiene muchas asesores
    public function asesores(){
        return $this->hasMany(Asesorempresa::class, 'empresa_id');
    }
}
