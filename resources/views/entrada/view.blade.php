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
        <h1>Entradas de Productos</h1>
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
                <a type="submit" class="btn btn-success" href="{{route('entredaproducto')}}"> <i class="nav-icon fas fa-plus">Registrar Entrada</i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="datatables" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Descripción</th>
                      <th>Cantidad Entrda</th>
                      <th>Precio Entrada</th>
                      <th>Fecha Realizada</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($entradas as $entradaviews)
                        <tr>
                            <td>{{ $entradaviews->id }}</td>
                            <td>{{ $entradaviews->producto_nombre }}</td>
                            <td>{{ $entradaviews->descripcion }}</td>
                            <td>{{ $entradaviews->cantidad_entrada }}</td>
                            <td>{{ $entradaviews->precio_entrada }}</td>
                            <td>{{ $entradaviews->created_at }}</td>
                         
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Cantidad Entrda</th>
                        <th>Precio Entrada</th>
                        <th>Fecha Realizada</th>
                    </tr>
                    </tfoot>
                  </table>
                  <br>
                  {{-- Enlaces de paginación --}}
                  <div class="pagination-wrapper">
                    {{ $entradas->links('vendor.pagination.bootstrap-4') }} <!-- Asegúrate de que el estilo coincide con tu CSS -->
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