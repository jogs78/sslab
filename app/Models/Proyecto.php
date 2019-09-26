<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    /**
     * The table associated with the model.
     *
     * Eloquent asociará el modelo con una tabla por conveción usando el nombre plural del modelo
     * La conveción es en ingles, por lo que buscará una tabla "nombre del modelo + s".
     * Si no se usa la conveción, especificar el nombre de la tabla en el atributo $table.
     * 
     * @var string
     */
    protected $table = 'proyecto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'horas_cubrir',
        'titulo',   
        'prestador', 
        'responsable',
        'created_at',
        'updated_at', 
    ];

    /*** Leer más sobre Eloquent y relaciones.


    /**
     * Obtener el prestador del proyecto .
     */
    public function prestadorProyecto()
    {
        return $this->belongsTo('App\Models\User', 'prestador', 'id');
    }    
    /**
     * Obtener el responsable del proyecto que el usuario tiene asignado.
     */
    public function responsableProyecto()
    {
        return $this->belongsTo('App\Models\Responsable', 'responsable','id');
    }    
    /**
     * Obtener el horario que el usuario tiene asignado.
     */
    public function horarioProyecto()
    {
        return $this->hasMany('App\Models\Horario', 'proyecto_id','id');
    }       
    /**
     * Obtener las asistencias que el usuario tiene asignadas.
     */
    public function asistenciasProyecto()
    {
        return $this->hasMany('App\Models\Asistencia', 'proyecto_id');
    }        
    /**
     * Obtener las incidencias que el usuario tiene asignadas.
     */
    public function incidenciasProyecto()
    {
        return $this->hasMany('App\Models\Incidencia', 'proyecto_id');
    } 
    /**
     * Obtener las incidencias que el usuario tiene asignadas.
     */
    public function horas_cubirtas()
    {
        $cantidad = 0;
        //tomar cantidad a cubri (proyecto->acubrir)
        //sumar cuantas horas tiene en asistencias
        //lo regresas
        return $this->asistenciasProyecto->where('validar', 0)->sum('horas_realizadas');
    } 
    public function faltas()
    {
        return $this->incidenciasProyecto->where('justificada', 0)->count();
    }
    public function permisos()
    {
        return $this->incidenciasProyecto->where('justificada', 1)->count();
    }

}
