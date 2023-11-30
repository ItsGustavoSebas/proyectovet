<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaMedica extends Model
{
    use HasFactory;
    protected $table = 'receta_medica';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'FechaEmision', 
        'ID_Consulta',
        'ID_Empleado'
    ];

    public function detalle_receta()
    {
        return $this->hasMany(DetalleReceta::class, 'ID_RecetaMedica');
    }

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'ID_Consulta');
    }

    public function empleado()
    {
        return $this->belongsTo(User::class, 'ID_Empleado', 'id');
    }
}
