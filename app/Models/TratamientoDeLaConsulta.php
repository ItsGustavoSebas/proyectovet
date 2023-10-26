<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TratamientoDeLaConsulta extends Model
{
    use HasFactory;

    protected $table = 'tratamiento_de_la_consulta';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'duracion',
        'fechaInicio',
        'fechaFin',
        'siguienteVisita',
        'ID_Tratamiento',
        'ID_Consulta',
        'ID_Historial',
    ];
    public function tratamiento() {
        return $this->belongsTo(Tratamiento::class, 'ID_Tratamiento', 'id');
    }
}
