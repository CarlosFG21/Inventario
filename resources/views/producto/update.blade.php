@extends('layout.plantilla')

@section('contenido')

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
  <!--Inicio del fondo donde iran todos los componetes del formulario-->
     <section class="content">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Formulario de actualización de productos</h3> 
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
          <!--Aqui se agregaran todos los componente de los inputs del formulario como los botones tambien-->
          <form method="POST" action="{{route('productoupdate',$productovisual->id)}}">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombre del producto</label>
                  <input type="text" class="form-control" placeholder="Nombre del Producto" name="producto" value="{{$productovisual->nombre_producto}}"
                  pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="3" maxlength="25">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Descripción del Proveedor</label>
                  <input type="text" class="form-control" placeholder="Descripción del Producto" name="descripcion" value="{{$productovisual->descripcion}}"
                  required pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="3" maxlength="60">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Cantidad de Unidades</label>
                  <input type="number" class="form-control" placeholder="Cantidad de Unidades" name="cantidad" value="{{$productovisual->cantidad}}"
                   required disabled>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Precio del Producto</label>
                  <input type="number" class="form-control" placeholder="Precio del Producto" name="precio" value="{{$productovisual->precio}}"
                   required>
                </div>
              </div>
               <!-- Botones del formulario-->
              <div class="">
                <input type="submit" value="Guardar" class="btn btn-primary " name="btnGuardarProducto" id="btnGuardarProducto">
                <a type="submit" class="btn btn-danger" href="{{route('productoview')}}">Regresar</a>
              </div> 
          </form>
           <!--Aqui se termina el espacio donde se agregan todos los componente-->
        </div>
      </div>

    </section>
    
@endsection