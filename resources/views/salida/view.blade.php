@extends('layout.plantilla')

@section('contenido')


@if(@session('success'))
    
  <script>
   Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000
    });  
  </script>

@endif
 
 <!--Encabezado solo muestra el nombre del modulo arriba-->
 <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Salidas de Productos</h1>
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div><!--Terminacion del modulo del encabezad-->

  <!--Inicio del fondo donde iran todos componente y tablas-->
     <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            
              <div class="card">
                <div class="card-header">
                <a type="submit" class="btn btn-success" href="{{route('salidaproducto')}}"> <i class="nav-icon fas fa-plus">Registrar Salida</i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="datatables" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Descripción</th>
                      <th>Cantidad Salida</th>
                      <th>Precio Salida</th>
                      <th>Fecha Realizada</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($salidas as $salidasviews)
                        <tr>
                            <td>{{ $salidasviews->id }}</td>
                            <td>{{ $salidasviews->producto_nombre }}</td>
                            <td>{{ $salidasviews->descripcion }}</td>
                            <td>{{ $salidasviews->cantidad_salida }}</td>
                            <td>{{ $salidasviews->precio_salida }}</td>
                            <td>{{ $salidasviews->created_at }}</td>
                         
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                      <th>Producto</th>
                      <th>Descripción</th>
                      <th>Cantidad Salida</th>
                      <th>Precio Salida</th>
                      <th>Fecha Realizada</th>
                    </tr>
                    </tfoot>
                  </table>
                  <br>
                  <div class="pagination-wrapper">
                    {{ $salidas->links('vendor.pagination.bootstrap-4') }} <!-- Asegúrate de que el estilo coincide con tu CSS -->
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
  <!--Finalizacion de todos los componentes y tablas-->
    </section>
    
@endsection