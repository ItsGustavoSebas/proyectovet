<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota_Venta extends Model
{
    use HasFactory;


    protected $table = 'nota_venta';

    protected $primaryKey = 'id';

    protected $fillable = [
        'montoTotal',
        'fecha',
    ];
    

    // Relación con factura
    public function factura() {
        return $this->hasOne(Factura::class, 'ID_Nota_Venta');
    }

     // Relación con recibo...
    

    
}
