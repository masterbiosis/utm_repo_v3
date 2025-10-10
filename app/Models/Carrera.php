<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    /** @use HasFactory<\Database\Factories\CarreraFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    //La carrera tiene un director
    public function director(){
        return $this->hasOne(Subdirector::class);
    }
    
    //La carrera tiene muchos programas educativos
    public function programas(){
        return $this->hasMany(Programa::class);
    }

}
