<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $table = 'tratamiento';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'diagnostico',
        'descripcion',
        'precio',
    ];

    public function consultas()
    {
        return $this->belongsToMany(Consulta::class, 'tratamiento_de_la_consulta');
    }
}
