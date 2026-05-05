<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directortesi extends Model
{
    /** @use HasFactory<\Database\Factories\DirectortesiFactory> */
    use HasFactory;

    protected $fillable=[
        'nombre',
        'apellidop',
        'apellidom',
        'ultimoGradoEstudio',
        'siglasEstudio',
        'telefono',
        'email'
    ];

    public function documentos(){
        return $this->hasMany(Documento::class,'director_tesi_id','id');
    }

    public function alumnos(){
        return $this->hasMany(Alumno::class);
    }
}
