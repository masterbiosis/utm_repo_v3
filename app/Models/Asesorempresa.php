<?php

namespace App\Models;

use Dom\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesorempresa extends Model
{
    /** @use HasFactory<\Database\Factories\AsesorempresaFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'app',
        'apm',
        'email',
        'telefono',
        'empresa_id'
    ];

    //El asesor pertenece a una empresa
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    //El asesor empresarial tiene muchas documentos
    public function documentos(){
        return $this->hasMany(Documento::class);
    }

}
