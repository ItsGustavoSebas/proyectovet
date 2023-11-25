<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'factura';

    protected $primaryKey = 'ID_Nota_Venta';

    protected $fillable = [
        'nroFactura',
        'nit',
        
    ];

    // Relación con el modelo Usuario
    public function nota_venta()
    {
        return $this->belongsTo(Nota_Venta::class, 'ID_Nota_Venta');
    }
}
