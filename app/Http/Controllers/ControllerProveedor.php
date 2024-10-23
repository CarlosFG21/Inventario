<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;


class ControllerProveedor extends Controller
{
    /* Creacion de la funcion para guardar los datos del proveedor */  /*Reques hace una peticion para el envio de la funcion */

    public function GuardarProveedor(Request $resquet){
         
        /* Creamos una instancia del modelo */

        $proveedorg = new Proveedor();

         /* Validacion de datos enviados*/
         $validacion = $resquet->validate([

            'proveedor' => 'required|string|max:25',
             'descripcion' => 'required|string|max:60',
             'telefono' => 'required|digits:8',
             'empresa' => 'required|string|max:60',

         ]);

         $proveedorverificar = Proveedor::where('nombre_proveedor',$validacion['proveedor'])->exists();

         if($proveedorverificar){
            

            return redirect()->route('proveedorcreate')->with('denegado','El proveedor a ingresar ya existe');

         }
         
         /* Mandamos los datos obtenido y validados a la base de datos a traves de el metodo save */
         $proveedorg->nombre_proveedor = $validacion['proveedor'];
         $proveedorg->descripcion = $validacion['descripcion'];
         $proveedorg->telefono = $validacion['telefono'];
         $proveedorg->nombre_empresa = $validacion['empresa'];
         $proveedorg->estado = 1; 
         $proveedorg->save();


         /*Luego de guardar los datos redireccionamos a la vista de los proveedores en la tabla*/

         return redirect()->route('proveedorview')->with('success','Datos Guardados correctamente');

    }

    /* Creacion de la funcion que muestra los datos*/
    public function MostrarProveedor(){

        $proveedorv = Proveedor::paginate(10);

        return view('proveedor.view',compact('proveedorv'));

    }

    /*Creacion de la funcion para mostrar los datos en la vista de la edicion del proveedor */
    public function VisualizarProveedor($id){
    
        $proveedorview = Proveedor::findOrFail($id);

        return view('proveedor.update',compact('proveedorview'));
        
    }

    /* Creacion de la funcion para actualizar los datos del proveedor */

    public function ActualizaProveedor(Request $request,$id){

        $proveedoract = Proveedor::findOrFail($id);

        $validacion = $request->validate([

            'proveedor' => 'required|string|max:25',
             'descripcion' => 'required|string|max:60',
             'telefono' => 'required|string|max:8',
             'empresa' => 'required|string|max:60',

         ]);

         $proveedoract->nombre_proveedor = $validacion['proveedor'];
         $proveedoract->descripcion = $validacion['descripcion'];
         $proveedoract->telefono = $validacion['telefono'];
         $proveedoract->nombre_empresa = $validacion['empresa'];
         $proveedoract->save();

         return redirect()->route('proveedorview')->with('update','Datos actualizados correctamente');

    }

    /* Funcion para desactivar los proveedores */

    public function DesactivarProveedor($id){
      
        $proveedordel = Proveedor::findOrFail($id);

        $proveedordel->estado = 0;
        $proveedordel->save();

        return redirect()->route('proveedorview');

    }

    /* Funcion para reactivar los proveedores */

    public function ReactivarProveedor($id){

        $proveedoreac = Proveedor::findOrfail($id);
        
        $proveedoreac->estado = 1;
        $proveedoreac->save();
        
        return redirect()->route('proveedorview');
    }
}
