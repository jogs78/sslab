<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * Eloquent asociará el modelo con una tabla por conveción usando el nombre plural del modelo
     * La conveción es en ingles, por lo que buscará una tabla "nombre del modelo + s".
     * Si no se usa la conveción, especificar el nombre de la tabla en el atributo $table.
     * 
     * @var string
     */
    protected $table = 'asistencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'fecha_relizado',
        'hora_llegada', 
        'hora_salida',
        'horas_realizadas',
        'validar',
        'proyecto_id',
        'observaciones',
    ];

    /*** Leer más sobre Eloquent y relaciones.

    /**
     * Obtener el prestador.
     */
    public function prestador()
    {	
    	//belongsTo(modelo, llave foránea)
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
