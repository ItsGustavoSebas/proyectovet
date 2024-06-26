<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'correo',
        'telefono',
        'direccion',
    ];
}
