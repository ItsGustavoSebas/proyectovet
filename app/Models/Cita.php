<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Cita extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha',
        'descripcion',
        'fechaProgramada' ,
        'hora' ,
        'tipo',
        'ID_Cliente',
    ];

    public function cliente() {
        return $this->belongsTo(User::class, 'ID_Cliente', 'id');
    }

    public function Servicio()
    {
        return $this->belongsToMany(Servicio::class, 'detalleservicio');
    }
}
