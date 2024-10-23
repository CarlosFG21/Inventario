@extends('layout.plantilla')

@section('contenido')

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Entradas</h1>
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div><!--Terminacion del modulo del encabezad-->

  <!--Inicio del fondo donde iran todos los componetes del formulario-->
     <section class="content">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Registro de entradas</h3> 
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
         <div>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-proveedor">
            <i class="fa fa-search"></i>
            Buscar Proveedor
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
               @foreach ($productomodal  as $item)
               <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre_producto}}</td>
                <td>{{$item->descripcion}}</td>
                <td>{{$item->cantidad}}</td>
                <td>{{$item->precio}}</td>
                <td>
                  <button class="btn btn-success select-btn" data-dismiss="modal" >Seleccionar</button>
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
           <div class="modal fade" id="modal-proveedor">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Proveedores Activos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <table id="datatable2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre del Proveedor</th>
                  <th>Descripción</th>
                  <th>Empresa</th>
                  <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                  
                 @foreach ($proveedormodal   as $proveedormoda)
                 <tr>
                  <td>{{$proveedormoda->id}}</td>
                  <td>{{$proveedormoda->nombre_proveedor}}</td>
                  <td>{{$proveedormoda->descripcion}}</td>
                  <td>{{$proveedormoda->nombre_empresa}}</td>
                  <td>
                    <button class="btn btn-success select-btn2" data-dismiss="modal">Seleccionar</button>
                  </td>
                </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nombre del Proveedor</th>
                  <th>Descripción</th>
                  <th>Empresa</th>
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
                  <label>Cantidad de Entrada</label>
                  <input  style="background-color: #fff819" type="number" class="form-control"  id="cantidadentrada" name="cantidadentrada"
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
                  <label>Precio Entrada</label>
                  <input type="number" class="form-control" placeholder=""  id="precio" name="precio"
                   required minlength="8" maxlength="8">
                </div>
              </div>
              <div class="col-sm-4">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombre del Proveedor</label>
                  <input type="text" class="form-control" placeholder=""  id="proveedor" name="proveedor"
                   required minlength="8" maxlength="8" disabled>
                </div>
              </div>
              <div class="col-sm-2">
                <!-- text input -->
                <div class="form-group">
                  <label></label>
                  <input type="text" class="form-control" placeholder="" id="idproveedor" name="idproveedor"
                   required minlength="8" maxlength="8" disabled hidden>
                </div>
              </div>
               <!-- Botones del formulario-->
               <div class="">
                <button  class="btn btn-primary" type="submit">Agregar Datos</button>
                <a type="submit" class="btn btn-danger" href="{{route('entradaWiew')}}">Regresar</a>
              </div> 
          </form>

        </div>
      </div>

    </section>


<!--Inicio del fondo donde iran todos los componetes del formulario-->
<section class="content">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Detalle de Entradas</h3> 
        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <form id="myForm" action="{{route('guardarEntrada')}}" method="POST">
          @csrf
        <table id="miTabla" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Nombre del Producto</th>
              <th>Descripción</th>
              <th>Cantidad de Entrada</th>
              <th>Precio Entrada</th>
              <th>Nombre Proveedor</th>
              <th >Id proveedor</th>
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
                <th>Cantidad de Entrada</th>
                <th>Precio Entrada</th>
                <th>Nombre Proveedor</th>
                <th >Id proveedor</th>
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
          var cantidadentrada= $('#cantidadentrada').val();
          var precio= $('#precio').val();
          var proveedor= $('#proveedor').val();
          var idproveedor= $('#idproveedor').val();

          if (idproducto === '' || idproveedor === '' || descripcion === '' ||  cantidadentrada === '' ) {
                    alert('Por favor, completa todos los campos.');
                    return; // Detener la ejecución si hay campos vacíos
                }

          // Agregar una nueva fila a la DataTable con el botón "Eliminar Todo"
          tabla.row.add([
            idproducto,
              producto,
              descripcion,
              cantidadentrada,
              precio,
              proveedor,
              idproveedor,
              '<button type="button" id="eliminarFila" class="btn btn-danger" >Eliminar</button>'
          ]).draw(false);

          // Limpiar el formulario después de agregar los datos
          this.reset();
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
            id_productoe: cells[0].innerText,
            productoe: cells[1].innerText,
            descripcione: cells[2].innerText,
            cantidadentradae: cells[3].innerText,
            precioe: cells[4].innerText,
            proveedore: cells[5].innerText,
            idproveedore: cells[6].innerText,
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

