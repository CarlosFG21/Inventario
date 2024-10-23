<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    /*P`roteccion de variables */

    protected $table = 'salida';

    protected $primaryKey = 'id';

    protected $fillable = [
    
    'descripcion',
    'cantidad_salida',
    'precio_salida',
    'estado',
    'id_producto',
    'id_cliente',
    'created_at',
    'updated_at',

    ];

    /*Uso del BelongsTo para la relacion con la tabla salida*/
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

     /*Uso del BelongsTo para la relacion con la tabla salida*/
     public function cliente()
     {
         return $this->belongsTo(Cliente::class);
     }
}
