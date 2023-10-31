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
        'FechaInicio',
        'FechaFin',
        'SiguienteVisita',
        'ID_Tratamiento',
        'ID_Consulta',
        'ID_Historial',
    ];
    public function tratamientos() {
        return $this->belongsTo(Tratamiento::class, 'ID_Tratamiento', 'id');
    }

    public function consultas() {
        return $this->belongsTo(Consulta::class, 'ID_Consulta', 'id');
    }

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class, 'ID_Tratamiento');
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'ID_Consulta');
    }
    
}
