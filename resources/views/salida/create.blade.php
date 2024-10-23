@extends('layout.plantilla')

@section('contenido')

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Salidas</h1>
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div><!--Terminacion del modulo del encabezad-->

  <!--Inicio del fondo donde iran todos los componetes del formulario-->
     <section class="content">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Registro de salidas</h3> 
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
         <div>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-cliente">
            <i class="fa fa-search"></i>
            Buscar Cliente
            </button>

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-producto">
            <i class="fa fa-search"></i>
            Buscar Producto
            </button>
         </div>
           <!--Codigo del modal para mostrar los productos -->
         <div class="modal fade" id="modal-producto">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Productos Activos</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Accion</th>
              </tr>
              </thead>
              <tbody>
               @foreach ($productos  as $item)
               <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre_producto}}</td>
                <td>{{$item->descripcion}}</td>
                <td>{{$item->cantidad}}</td>
                <td>{{$item->precio}}</td>
                <td>
                  <button class="btn btn-success select-btn4" data-dismiss="modal" >Seleccionar</button>
                </td>

              </tr>
               @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>ID</th>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Accion</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </div>
          </div>
          </div>

           <!--Terminacion del modal de productos -->

           <!--Codigo para mostrar el modal del proveedor -->
           <div class="modal fade" id="modal-cliente">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Clientes Activos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <table id="datatable3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre del Cliente</th>
                  <th>Dirección</th>
                  <th>Telefono</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                  
                 @foreach ($clientes as $clientesmodal)
                 <tr>
                  <td>{{$clientesmodal->id}}</td>
                  <td>{{$clientesmodal->nombre_completo}}</td>
                  <td>{{$clientesmodal->direccion}}</td>
                  <td>{{$clientesmodal->telefono}}</td>
                  <td>
                    <button class="btn btn-success select-btn2" data-dismiss="modal">Seleccionar</button>
                  </td>
                </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Cliente</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Accion</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            </div>
            </div>
              <!--Terminacion del modal de proveedor -->
         <br>

         @if(session('errors'))
         <div class="alert alert-danger">
             <ul>
                 @foreach (session('errors') as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif

         <form id="miFormulario" >
            <div class="row">
              <div class="col-sm-2">
                <!-- text input -->
                <div class="form-group">
                  <label>ID</label>
                  <input type="text" class="form-control" placeholder=""  id="idproducto" name="idproducto"
                  pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="3" maxlength="25" disabled>
                </div>
              </div>
              <div class="col-sm-4">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombre del producto</label>
                  <input type="text" class="form-control" placeholder=""  id="producto" name="producto"
                  required pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="3" maxlength="60" disabled>
                </div>
              </div>
              <div class="col-sm-4">
                <!-- text input -->
                <div class="form-group">
                  <label>Descripción</label>
                  <input type="text" class="form-control" placeholder=""  id="descripcion"  name="descripcion"
                   required minlength="8" maxlength="75">
                </div>
              </div>
              <div class="col-sm-2">
                <!-- text input -->
                <div class="form-group">
                  <label>Cantidad de Salida</label>
                  <input  style="background-color: #fff819" type="number" class="form-control"  id="cantidadsalida" name="cantidadsalida"
                  pattern="^[a-zA-Záéíóú ]{1,30}"  minlength="3" maxlength="60"> 
                </div>
              </div>
              <div class="col-sm-2">
                <!-- text input -->
                <div class="form-group">
                  <label>Cantidad Disponible</label>
                  <input type="number" class="form-control"   id="cantidadisponible" name="cantidadisponible"
                   required minlength="8" maxlength="8" disabled>
                </div>
              </div>
              <div class="col-sm-2">
                <!-- text input -->
                <div class="form-group">
                  <label>Precio Salida</label>
                  <input type="text" class="form-control" placeholder=""  id="precio" name="precio"
                   required minlength="8" maxlength="8" disabled>
                </div>
              </div>
              <div class="col-sm-4">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombre del Cliente</label>
                  <input type="text" class="form-control" placeholder=""  id="cliente" name="cliente"
                   required minlength="8" maxlength="8" disabled>
                </div>
              </div>
              <div class="col-sm-2">
                <!-- text input -->
                <div class="form-group">
                  <label></label>
                  <input type="text" class="form-control" placeholder="" id="idcliente" name="idcliente"
                   required minlength="8" maxlength="8" disabled hidden>
                </div>
              </div>
               <!-- Botones del formulario-->
               <div class="">
                <button  class="btn btn-primary" type="submit">Agregar Datos</button>
                <a type="submit" class="btn btn-danger" href="{{route('salidaView')}}">Regresar</a>
              </div> 
          </form>

        </div>
      </div>

    </section>


<!--Inicio del fondo donde iran todos los componetes del formulario-->
<section class="content">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Detalle de Salidas</h3> 
        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <form id="myForm" action="{{route('guardarSalida')}}" method="POST">
          @csrf
        <table id="miTabla" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Nombre del Producto</th>
              <th>Descripción</th>
              <th>Cantidad de Salida</th>
              <th>Precio Salida</th>
              <th>Nombre Cliente</th>
              <th >Id Cliente</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
           
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
              <th>Nombre del Producto</th>
              <th>Descripción</th>
              <th>Cantidad de Salida</th>
              <th>Precio Salida</th>
              <th>Nombre Cliente</th>
              <th >Id Cliente</th>
              <th>Acciones</th>
            </tr>
            </tfoot>
          </table>
          <input type="hidden" name="data" id="data">
          <button type="submit" class="btn btn-success">Guardar Datos</button>
          </form>
      </div>
    </div>
  </section>  
    
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
      var tabla = $('#miTabla').DataTable();

      // Manejar el envío del formulario para agregar filas
      $('#miFormulario').on('submit', function(e) {
          e.preventDefault();

          // Capturar los valores del formulario
          var idproducto = $('#idproducto').val();
          var producto = $('#producto').val();
          var descripcion= $('#descripcion').val();
          var cantidadsalida= $('#cantidadsalida').val();
          var precio= $('#precio').val();
          var cliented= $('#cliente').val();
          var idcliented= $('#idcliente').val();

          if (idproducto === '' || idcliented === '' || descripcion === '' ||  cantidadsalida === '' ) {
                    alert('Por favor, completa todos los campos.');
                    return; // Detener la ejecución si hay campos vacíos
                }

          // Agregar una nueva fila a la DataTable con el botón "Eliminar Todo"
          tabla.row.add([
            idproducto,
              producto,
              descripcion,
              cantidadsalida,
              precio,
              cliented,
              idcliented,
              '<button type="button" id="eliminarFila" class="btn btn-danger" >Eliminar</button>'
          ]).draw(false);

          // Limpiar el formulario después de agregar los datos
          $('#idproducto').val(''); 
              $('#producto').val('');
              $('#cantidadsalida').val('');
              $('#cantidadisponible').val('');
              $('#descripcion').val('');
              $('#precio').val('');
      });

      // Manejar el clic del botón "Eliminar Todo" para eliminar todas las filas
      $('#miTabla tbody').on('click', '#eliminarFila', function() {
        tabla.row($(this).parents('tr')).remove().draw(); // Eliminar todas las filas de la DataTable
      });
  });
</script>
@endpush


@push('scripts')
<script>
document.getElementById('myForm').addEventListener('submit', function(event) {
    // Prevenir el envío tradicional del formulario para manejar los datos manualmente
    event.preventDefault();

    const table = document.getElementById('miTabla');
    const rows = table.querySelectorAll('tbody tr');
    const data = [];

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const rowData = {
            id_productos: cells[0].innerText,
            productos: cells[1].innerText,
            descripcions: cells[2].innerText,
            cantidadsalidas: cells[3].innerText,
            precios: cells[4].innerText,
            clientes: cells[5].innerText,
            idclientes: cells[6].innerText,
        };
        data.push(rowData);
    });

    // Establecer los datos como valor del campo oculto
    document.getElementById('data').value = JSON.stringify(data);

    // Enviar el formulario
    this.submit();
});
</script>
@endpush