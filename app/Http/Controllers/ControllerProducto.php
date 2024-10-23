<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;


class ControllerProducto extends Controller
{
    //Creacion de la funcion para guardar los productos 
    public function GuardarProducto(Request $request){

        $productocreat = new Producto();

        $validacion = $request->validate([

            'producto' => 'required|string|max:65',
            'descripcion' => 'required|string|max:85',
            'cantidad' => 'required|string|max:4',
            'precio' => 'required|string|max:4',

        ]);

        $productoexiste = Producto::where('nombre_producto', $validacion['producto'])->exists();

        if($productoexiste){

            return redirect()->route('productocreate')->with('advertencia','El producto a ingresar ya existe');

        }

        $productocreat->nombre_producto = $validacion['producto'];
        $productocreat->descripcion = $validacion['descripcion'];
        $productocreat->cantidad = $validacion['cantidad'];
        $productocreat->precio = $validacion['precio'];
        $productocreat->estado = 1;
        $productocreat->save();

        return redirect()->route('productoview')->with('success','Datos guardados correctamente');
    }

    /*Funcion para mostrar todos los productos que ya fueron registrados */

    public function MostrarProductos(){

        $productoview = Producto::paginate(10);

        return view('producto.view',compact('productoview'));

    }

    /* Creacion de la funcion para mostrar los datos del producto que se va a editar */
    public function VisualizarProducto($id){

        $productovisual = Producto::findOrFail($id);

        return view('producto.update', compact('productovisual'));

    }


    /* Funcion para editar los datos del producto*/
    public function EditarProducto(Request $request, $id){
         
        $productoupdate = Producto::findOrFail($id);

        $validacion = $request->validate([

            'producto' => 'required|string|max:65',
            'descripcion' => 'required|string|max:85',
            'cantidad' => 'required|string|max:4',
            'precio' => 'required|string|max:4',

        ]);

        $productoupdate->nombre_producto = $validacion['producto'];
        $productoupdate->descripcion = $validacion['descripcion'];
        $productoupdate->cantidad = $validacion['cantidad'];
        $productoupdate->precio = $validacion['precio'];
        $productoupdate->save();

        return redirect()->route('productoview')->with('update','Datos actualizados correctamente');

    }

    /*Funcion para eliminar los productos*/

    public function EliminarProducto($id){
       
        $productodelete = Producto::findOrFail($id);
        $productodelete->estado = 0;
        $productodelete->save();

        return redirect()->route('productoview');
        
    }
    
    /*Funcion para reactivar el producto */
    public function ReactivarProducto($id){

        $productoreactivar = Producto::findOrFail($id);
        $productoreactivar->estado = 1;
        $productoreactivar->save();

        return redirect()->route('productoview');
    }
}
