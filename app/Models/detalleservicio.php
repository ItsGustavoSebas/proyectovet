<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleservicio extends Model
{
    use HasFactory;

    protected $table = 'detalleservicio';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',       
        'Tiempo',
        'ID_Cita',
        'ID_Servicio',
        'ID_Empleado',
    ];

    public function Cita()
    {
        return $this->belongsTo(Cita::class, 'ID_Cita');
    }

    public function Servicio()
    {
        return $this->belongsTo(Servicio::class, 'ID_Servicio');
    }

    public function Empleado() {
        return $this->belongsTo(User::class, 'ID_Empleado', 'id');
    }


}
