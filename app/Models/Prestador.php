<?php

namespace App\Models;

class Prestador extends User
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'users';
  
    /**
     * Obtener el proyecto en el cuál el usuario hace o hizo su servicio.
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'prestador');
    }

    /**
     * Obtener el horario en el cuál el usuario hace o hizo su servicio.
     * Establece el tipo de relacion "tiene un"...
     */
    public function horario()
    {
        return $this->hasOne('App\Models\Horario','prestador');
    }
    public function asistencia()
    {
        return $this->hasOne('App\Models\Asistencia','prestador');
    }
    public function incidencia()
    {
        return $this->hasOne('App\Models\Incidencia','prestador');
    }
}
