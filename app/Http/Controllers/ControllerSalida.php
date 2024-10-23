<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Salida;

class ControllerSalida extends Controller
{
    //

    /*funcion para obtener los productos y clientes */

    public function ObtenterDatos(){

        $productos = Producto::where('estado',1)->get();
        $clientes = Cliente::where('estado',1)->get();

        return view('salida.create', compact('productos','clientes'));

    }

    public function GuardarSalidas(Request $request){

    $data = json_decode($request->input('data'), true);

    $estado = 1;

    $errors = [];
    
    foreach ($data as $item) {

        $productoe = Producto::find($item['id_productos']);

        if ($item['cantidadsalidas'] > $productoe->cantidad) {
            // Si la cantidad a salir es mayor, agrega un mensaje de error
            $errors[] = "Cantidad de salida para el producto ID {$item['id_productos']} excede la cantidad disponible.";
            continue;
        }

        Salida::create([
            'id_producto' => $item['id_productos'],
            'descripcion' => $item['descripcions'],
            'cantidad_salida' => $item['cantidadsalidas'],
            'precio_salida' => $item['precios'],
            'estado' => $estado,
            'id_cliente' => $item['idclientes'],
        ]);

        
       
            // Actualizar los campos necesarios en Producto
            $productoe->cantidad -= $item['cantidadsalidas'];
            // Agrega más campos si es necesario
            $productoe->save();
        

    } 

    if (count($errors) > 0) {
        // Si hubo errores, redirige con los mensajes de error
        return redirect()->route('salidaproducto')->with('errors', $errors);
    }

    return redirect()->route('salidaView')->with('success', 'Salidas guardadas con exitos.');

   }

   /*Creacion de la funcion para mostrar los datos de la salida del producto */

   public function MostrarSalida(){

    $salidas = Salida::with('producto')->get();

    $salidas = Salida::select('salida.*', 'producto.nombre_producto as producto_nombre')
->join('producto', 'salida.id_producto', '=', 'producto.id')
->paginate(10);

return view('salida.view',compact('salidas'));

   }

}
