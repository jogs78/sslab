<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class revisor extends Model
{

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'users';
    
    /**
     * Obtener el proyecto que tiene asignado el usuario como revisor.
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'revisor','id');
    }
}

