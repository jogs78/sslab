<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
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
    protected $table = 'incidencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'proyecto_id', 
        'fecha', 
        'justificada',
        'observaciones',
        'created_at',
        'updated_at',
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