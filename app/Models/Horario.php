<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
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
    protected $table = 'horarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dia', 
        'hora',
        'salida',
        'proyecto_id',
    ];

    /*** Leer más sobre Eloquent y relaciones.

    /**
     * Obtener el prestador del proyecto.
     */
    public function prestador()
    {   
        //belongsTo(modelo, llave foránea)
        return $this->belongsTo('App\Models\Proyecto', 'user_id');
    }
}
