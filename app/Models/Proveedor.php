<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use HasFactory;

    /* Creacion del codigo del modelo */
    
    /*modelo de la tabla - que indica la tabla especifica de la base de datos */
    protected $table = 'proveedor';

    /* modelo de la llave primaria de la tabla especifica*/
    protected $primaryKey = 'id';

    /* atributos de los demas datos que se estaran pasando a la tabla de proveedores de la base de datos */

    protected $fillable = [
         'nombre_proveedor',
         'descripcion',
         'nombre_empresa',
         'telefono',
         'estado',
         'created_at',
         'update_at'
    ];

    /* Relacion de uno a muchos a traves de hasmany*/

    public function entrada(): HasMany
    {                         /* Dentro del parentesis hacemos referencia a la clase entrada del modelo Entrada*/
        return $this->hasMany(Entrada::class);
    }


}
