<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre', 
        'precioVenta', 
        'descripcion', 
        'ID_Categoria', 
        'ID_Marca'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_Categoria');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'ID_Marca');
    }

    public function loteprod()
    {
        return $this->hasMany(LoteProd::class, 'ID_Producto');
    }
}
