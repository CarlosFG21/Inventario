<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;

    /* Creacion de la proteccion de la tabla productos*/

    protected $table = 'producto';

    /*Creacion de la proteccion de la clave primaria */

    protected $primaryKey = 'id';

    /*Creacion de la proteccion de los demas atributos o campos de la table de productos */

    protected $fillable = [

        'nombre_producto',
        'descripcion',
        'cantidad',
        'precio',
        'estado',
        'created_at',
        'update_at'

    ];

    /*Creacion de la relacion de unos a muchos con Salidas y Entrada*/

    public function entrada()
    {     /*Hacemos referencia a la clase del Modelo entrada */
        return $this->hasMany(Entrada::class);
    }


    /*Creacion de la relacion de uno a muchos con Salidad */

    public function salida()
    {      /*Hace referencia a la clase del Modelo de salida */
        return $this->hasMany(Salida::class);
    }
}
