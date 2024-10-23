<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entrada extends Model
{
    use HasFactory;

    /*Proteccion de la tabla de Modelos */
    protected $table = 'entrada';

    /*proteccion de la llave primaria */
    protected $primaryKey = 'id';

    /*proteccion de los demas atributos o campos de la base de datos*/

    protected $fillable = [

        'descripcion',
        'cantidad_entrada',
        'precio_entrada',
        'estado',
        'id_proveedor',
        'id_producto',
        'created_at',
        'update_at'
    ];

    /*Uso del BelongsTo para la relacion con la tabla producto y producto*/
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    /*Uso del BelongsTo para la relacion con la tabla proveedor */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

}
