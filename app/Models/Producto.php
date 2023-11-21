<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'Producto';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'precioVenta',
        'descripcion',
        'descripcion',
        'cantidad',
        'fechaVencimiento',
        'ID_Categoria',
        'ID_Marcas',
    ];
    public function historial() {
        return $this->belongsTo(Categoria::class, 'ID_Categoria', 'id');
    }
    public function especie() {
        return $this->belongsTo(Marca::class, 'ID_Marca', 'id');
    }
}
