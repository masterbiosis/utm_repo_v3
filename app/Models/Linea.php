<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    /** @use HasFactory<\Database\Factories\LineaFactory> */
    use HasFactory;

    protected $fillable=[
        'nombre',
        'descripcion',
        'programa_id'
    ];

    public function documentos(){
        return $this->belongsToMany(Documento::class,'documento_linea','linea_id','documento_id');
    }

     public function programa(){
        //La línea pertenece a un programa
        return $this->belongsTo(Programa::class);
    }


}
