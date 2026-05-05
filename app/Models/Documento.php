<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentoFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'introduccion',
        'resumen',
        'fecha_presentacion',
        'alumno_id',
        'asesorempresa_id',
        'programa_id',
        'directortesis_id',
        'archivo_pdf'
    ];

     public function alumno(){
        return $this->belongsTo(Alumno::class);
    }

    //El documento tiene un asesor empresarial
    public function asesor(){
        return $this->belongsTo(Asesorempresa::class,'asesorempresa_id');
    }
    public function programa(){
        return $this->belongsTo(Programa::class);
    }
    public function directortesi(){
        return $this->belongsTo(Directortesi::class,'directortesis_id','id');
    }
    public function lineas(){
        return $this->belongsToMany(Linea::class,'documentolineas','documento_id','linea_id');
    }
}
