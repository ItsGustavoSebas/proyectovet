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
        'instrucciones',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }

    public function receta_medica()
    {
        return $this->belongsTo(RecetaMedica::class, 'ID_RecetaMedica');
    }

}
