<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota_Compra extends Model
{
    use HasFactory;


    protected $table = 'nota_compra';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'montoTotal',
    ];

    public function lotes()
    {
        return $this->hasMany(Lote::class, 'ID_NotaCompra');
    }
}
