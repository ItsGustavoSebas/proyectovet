<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $table = 'Recibo';

    protected $primaryKey = 'ID_Nota_Venta';

    protected $fillable = [
        'nroRecibo'
    ];

    // Relación con el modelo Usuario
    public function nota_venta()
    {
        return $this->belongsTo(Nota_Venta::class, 'ID_Nota_Venta');
    }
}
