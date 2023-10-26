<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $table = 'historial_medico';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'peso',
        'altura',
        'observacion',
    ];
}
