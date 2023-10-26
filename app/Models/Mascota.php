<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascota';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'sexo',
        'color',
        'fechaNacimiento',
        'edad',
        'esterilizado',
        'ID_Cliente',
        'ID_Especie',
        'ID_Raza',
        'ID_Historial',
    ];
    public function historial() {
        return $this->belongsTo(Historial::class, 'ID_Historial', 'id');
    }
    public function especie() {
        return $this->belongsTo(Especie::class, 'ID_Especie', 'id');
    }
    public function raza() {
        return $this->belongsTo(Raza::class, 'ID_Raza', 'id');
    }
    public function dueño() {
        return $this->belongsTo(User::class, 'ID_Cliente', 'id');
    }
}
