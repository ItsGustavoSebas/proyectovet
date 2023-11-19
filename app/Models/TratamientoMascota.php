<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TratamientoMascota extends Model
{
    use HasFactory;
    protected $table = 'tratamientos_mascota';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'duracion',
        'FechaInicio',
        'FechaFin',
        'SiguienteVisita',
        'visitas_realizadas',
        'dosis_totales',
        'frecuencia',
        'ID_Tratamiento',
        'ID_Historial',
    ];

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class, 'ID_Tratamiento');
    }

    public function historial() {
        return $this->belongsTo(Tratamiento::class, 'ID_Historial', 'id');
    }
}
