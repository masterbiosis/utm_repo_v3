<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentoFactory> */
    use HasFactory;

    protected $fillable = [
        'autor',
        'titulo',
        'introduccion',
        'resumen',
        'fecha_presentacion',
        'alumno_id',
        'asesor_id',
        'programa_id',
        'director_tesi_id',
        'archivo_pdf'
    ];

     public function alumno(){
        return $this->belongsTo(Alumno::class);
    }
    public function asesor(){
        return $this->belongsTo(Asesorempresa::class);
    }
    public function programa(){
        return $this->belongsTo(Programa::class);
    }
    public function directortesi(){
        return $this->belongsTo(DirectorTesi::class,'director_tesi_id','id');
    }
    public function lineas(){
        return $this->belongsToMany(Linea::class,'documentolinea','documento_id','linea_id');
    }
}
