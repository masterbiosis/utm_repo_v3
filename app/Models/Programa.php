<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramaFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'carrera_id',
    ];
}
