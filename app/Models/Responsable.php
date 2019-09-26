<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class responsable extends Model
{

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'users';
    
    /**
     * Obtener el proyecto que tiene asignado el usuario como responsable.
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'responsable','id');
    }
}
