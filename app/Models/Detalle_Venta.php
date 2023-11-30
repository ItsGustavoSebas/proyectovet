<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    use HasFactory;

    protected $table = 'detalle_venta';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ID_Producto',
        'ID_Nota_Venta',
        'cantidad',
        'precio',
    ];

    public function producto() {
        return $this->belongsTo(Producto::class, 'ID_Producto', 'id');
    }

    public function nota_venta() {
        return $this->belongsTo(Producto::class, 'ID_Nota_Venta', 'id');
    }
}
