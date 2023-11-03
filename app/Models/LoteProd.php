<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteProd extends Model
{
    use HasFactory;

    protected $table = 'loteprod';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ID_Producto', 
        'ID_Lote', 
        'cantidadComprada',
        'cantidadActual',
        'precioCompra',
        'ID_Medida',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'ID_Lote');
    }

    public function medida()
    {
        return $this->belongsTo(Medida::class, 'ID_Medida');
    }
}
