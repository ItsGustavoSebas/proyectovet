<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleReceta extends Model
{
    use HasFactory;

    protected $table = 'detalle_receta';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ID_RecetaMedica', 
        'ID_Producto', 
        'Cantidad',
        'precioVenta',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }

    public function recetamedica()
    {
        return $this->belongsTo(RecetaMedica::class, 'ID_RecetaMedica');
    }

}
