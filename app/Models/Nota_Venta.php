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
        'ID_Cliente',
        'ID_Empleado',
        'qr',
        'ID_Nota_Venta',
    ];
    

    // Relación con factura
    public function factura() {
        return $this->hasOne(Factura::class, 'ID_Nota_Venta');
    }

     // Relación con recibo
     public function Recibo() {
        return $this->hasOne(Factura::class, 'ID_Nota_Venta');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente', 'ID_Usuario');
    }

    public function detalleVenta()
    {
        return $this->hasMany(Detalle_Venta::class, 'ID_Nota_Venta');
    }

    public function detalleCita()
    {
        return $this->hasMany(Cita::class, 'ID_Nota_Venta');
    }
}
