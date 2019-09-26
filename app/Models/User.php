<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    CONST USUARIO_PRESTADOR = 'Prestador';

    CONST USUARIO_RESPONSABLE = 'Auxiliar';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nombre', 'apellido', 'telefono', 'tipousuario', 'numcontrol', 'activo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Obtener el prestador del proyecto.
     */
    public function prestador()
    {   
        //belongsTo(modelo, llave foránea)
        return $this->hasOne('App\Models\Proyecto', 'prestador','id');
    }

    /**
     * Obtener el responsable del proyecto.
     */
    public function oresponsable()
    {
        return $this->belongsTo('App\Models\Proyecto', 'responsable');
    }
    /**
     * Obtener el revisor del proyecto.
     */
    public function revisor()
    {
        return $this->belongsTo('App\Models\Proyecto', 'revisor');
    }
}