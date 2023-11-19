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
        'precio',
        'fecha',
        'ID_TratamientoMascota',
        'ID_Consulta',
    ];

    public function consultas() {
        return $this->belongsTo(Consulta::class, 'ID_Consulta', 'id');
    }

    public function tratamientoMascota()
    {
        return $this->belongsTo(TratamientoMascota::class, 'ID_TratamientoMascota');
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'ID_Consulta');
    }
    
}
