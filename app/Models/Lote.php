<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $table = 'lote';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'numeroLote', 
        'fechaCompra', 
        'fechaVencimiento',
        'estado',
        'ID_Proveedor',
        'ID_NotaCompra'
    ];

    public function loteprod()
    {
        return $this->hasMany(LoteProd::class, 'ID_Lote');
    }

    public function cantProductos()
    {
        return $this->hasMany(LoteProd::class, 'ID_Lote')->count();
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'ID_Proveedor');
    }

    public function nota_compra()
    {
        return $this->belongsTo(Nota_Compra::class, 'ID_NotaCompra');
    }
}
