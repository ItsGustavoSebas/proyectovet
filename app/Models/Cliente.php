<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = 'ID_Usuario';

    protected $fillable = [
        
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_Usuario');
    }

    public function citas()
{
    return $this->hasMany(Cita::class);
}
}
