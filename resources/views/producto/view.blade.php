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

@if(session('update'))

<script>
  Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('update') }}',
        showConfirmButton: false,
        timer: 3000
    });  
</script>
@endif  

 <!--Encabezado solo muestra el nombre del modulo arriba-->
 <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Productos</h1>
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
                <a type="submit" class="btn btn-success" href="{{route('productocreate')}}"><i class="nav-icon fas fa-plus">Ingresar Producto</i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="datatables" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Descripción</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach ($productoview as $item)
                     <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->nombre_producto}}</td>
                      <td>{{$item->descripcion}}</td>
                      <td>{{$item->cantidad}}</td>
                      <td>{{$item->precio}}</td>
                      <td>
                       @if($item->estado==1)
                       <h4><span class='badge bg-success'>Activo</span></h4> 
                       @else
                       <h4><span class='badge bg-danger'>Inactivo</span></h4> 
                       @endif
                      </td>
                      <td>
                       <a href="{{route('productoeditar',$item->id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>

                       @if($item->estado ==1)
                       <a href="javascript:void(0);" onclick="ElimiarProducto('{{$item->id}}')" class="btn btn-danger"><i class='fas fa-trash'></i></a>
                       <form action="{{route('productodelete',$item->id)}}" id="delete-{{$item->id}}" method="POST">
                        @csrf
                        @method('put')
                       </form>                     
                       @else
                       <a href="javascript:void(0);" onclick="ReactivarProducto('{{$item->id}}')" class="btn btn-warning"><i class='fa fa-share-square'></i></a>
                        <form action="{{route('productoreactivar',$item->id)}}" id="reactivar-{{$item->id}}" method="POST">
                        @csrf
                        @method('put')
                        </form>
                       @endif
                      </td>
                     </tr>                     
                     @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>
                  </table>
                  <br>
                  <div class="pagination-wrapper">
                    {{ $productoview->links('vendor.pagination.bootstrap-4') }} <!-- Asegúrate de que el estilo coincide con tu CSS -->
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
   <script>
     function ElimiarProducto(id){
      Swal.fire({
        title: '¿Estás seguro de eliminar el producto?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo',
            cancelButtonText: 'Cancelar'  
    }).then((result) => {
    if (result.isConfirmed) {
       document.getElementById('delete-' + id).submit();
    }
    });
    }
   </script>

<script>
  function ReactivarProducto(id){
   Swal.fire({
     title: '¿Estás seguro de reactivar el producto?',
         text: "¡No podrás revertir esto!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Sí, reactivarlo',
         cancelButtonText: 'Cancelar'  
 }).then((result) => {
 if (result.isConfirmed) {
    document.getElementById('reactivar-' + id).submit();
 }
 });
 }
</script>

    
@endsection