<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consulta';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'Fecha',
        'Motivo',
        'MontoTotal',
        'Observacion',
        'ID_Cita',
        'ID_Empleado',
        'ID_Mascota',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'ID_Mascota', 'id');
    }

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'ID_Cita', 'id');
    }

    public function tratamientos()
    {
        return $this->belongsToMany(Tratamiento::class, 'tratamiento_de_la_consulta');
    }
}
