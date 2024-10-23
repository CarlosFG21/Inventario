<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Entrada;

class ControllerEntrada extends Controller
{
    //Funcion para cargar los datos de los modales
    public function Modales(){

        $productomodal = Producto::where('estado',1)->get();
        $proveedormodal = Proveedor::where('estado',1)->get();

        return view('entrada.create', compact('productomodal','proveedormodal'));

    }

    public function MostrarEntradas(){
        
        $entradas = Entrada::with('producto')->get();

        $entradas = Entrada::select('entrada.*', 'producto.nombre_producto as producto_nombre')
    ->join('producto', 'entrada.id_producto', '=', 'producto.id')
    ->paginate(10);

    return view('entrada.view',compact('entradas'));

    }

   /*Funcion para guardar los datos de la entrada y actualizar la cantidad del producto */

   public function GuardarDatosE(Request $request){

    
    $data = json_decode($request->input('data'), true);

    $estado = 1;

    foreach ($data as $item) {

        Entrada::create([
            'id_producto' => $item['id_productoe'],
            'descripcion' => $item['descripcione'],
            'cantidad_entrada' => $item['cantidadentradae'],
            'precio_entrada' => $item['precioe'],
            'estado' => $estado,
            'id_proveedor' => $item['idproveedore'],
        ]);

        $productoe = Producto::find($item['id_productoe']);
        if ($productoe) {
            // Actualizar los campos necesarios en Producto
            $productoe->cantidad += $item['cantidadentradae'];
            // Agrega más campos si es necesario
            $productoe->save();
        }
    }

    return redirect()->route('entradaWiew')->with('success', 'Entradas guardadas con exitos.');

   }


}
