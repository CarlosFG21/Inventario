<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;
    
    /*Proteccion de la tabla clientes */
    protected $table = 'cliente';

    /* Proteccion de la clave primaria */
    protected $primaryKey = 'id';

    /*Proteccion de los demas atributos o campos de la tabla */

    protected $fillable = [

        'nombre_completo',
        'direccion',
        'nit',
        'telefono',
        'estado',
        'created_at',
        'updated_at'
        
    ];

    /* Creacion de la relacion de la tablas de Cliente con salida - de uno a muchos*/
    public function salida(): HasMany
    {
          /*Hacemos la referencia hacia la clase del modelo de Salida */
        return $this->hasMany(Salida::class);

    }



}
