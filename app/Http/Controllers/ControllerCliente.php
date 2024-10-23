<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ControllerCliente extends Controller
{
    //Creacion de todas las funciones del crud de Clientes
    public function MostrarCliente(){

        $clienteviews = Cliente::paginate(10);

        return view('cliente.view',compact('clienteviews'));

    }

    public function GuardarCliente(Request $request){
      
        $clientecreat = new Cliente();

        $validacion = $request->validate([
            'cliente' => 'required|string|max:65',
            'direccion' =>  'required|string|max:70',
            'nit' => 'required|string|max:9',
            'telefono' => 'required|digits:8',
        ]);

        $clienteexiste = Cliente::where('nombre_completo',$validacion['cliente'])->exists();

        if($clienteexiste){

            return redirect()->route('clientecreate')->with('advertencia','El cliente a ingresar ya existe');

        }

        $clientecreat->nombre_completo = $validacion['cliente'];
        $clientecreat->direccion = $validacion['direccion'];
        $clientecreat->nit = $validacion['nit'];
        $clientecreat->telefono = $validacion['telefono'];
        $clientecreat->estado =1;
        $clientecreat->save();

        return redirect()->route('clienteview')->with('success','Datos Guardados correctamente');

    }

    /*Creacion de la funcion para mostrar los datos del cliente a editar*/
    public function VisualizarCliente($id){

        $clienteviews = Cliente::findOrfail($id);

        return view('cliente.update', compact('clienteviews'));

    }

    /*Creacion de la funcion para editar los datos del cliente*/

    public function ActualizarCliente(Request $request, $id){
       
        $clienteupdate = Cliente::findOrfail($id);

        $validacion = $request->validate([

            'cliente' => 'required|string|max:65',
            'direccion' =>  'required|string|max:70',
            'nit' => 'required|string|max:9',
            'telefono' => 'required|digits:8',

        ]);

        $clienteupdate->nombre_completo = $validacion['cliente'];
        $clienteupdate->direccion = $validacion['direccion'];
        $clienteupdate->nit = $validacion['nit'];
        $clienteupdate->telefono = $validacion['telefono'];
        $clienteupdate->save();

        return redirect()->route('clienteview')->with('update','Datos actualizados correctamente');
        

    }

    /*Funcion para eliminar los clientes */
    public function EliminarCliente($id){

        $clientedelete = Cliente::findOrFail($id);

        $clientedelete->estado=0;
        $clientedelete->save();

        return redirect()->route('clienteview');

    }
    
    /*Funcion para reactivar los clientes */

    public function ReactivarCliente($id){

        $clientereactivar = Cliente::findOrFail($id);

        $clientereactivar->estado = 1;
        $clientereactivar->save();

        return redirect()->route('clienteview');

    }

}
