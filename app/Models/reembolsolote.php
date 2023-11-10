<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reembolsolote extends Model
{  
    use HasFactory;

    protected $table = 'reembolsolote';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'numeroLote', 
        'fechaCompra', 
        'fechaVencimiento',
        'ID_Proveedor'
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
}
