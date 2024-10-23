@extends('layout.plantilla')


@section('contenido')

    <!--Encabezado solo muestra el nombre del modulo arriba-->
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Proveedores</h1>
        </div>
        <div class="col-sm-6">
          
        </div>
      </div>
    </div><!--Terminacion del modulo del encabezad-->

    <!--Inicio del fondo donde iran todos los componetes del formulario-->
       <section class="content">
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Formulario de actualizacion de proveedores</h3> 
            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
            <!--Aqui se agregaran todos los componente de los inputs del formulario como los botones tambien-->
            <form action="{{route('proveedorupdate',$proveedorview->id)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Nombre del proveedor</label>
                    <input type="text" class="form-control" placeholder="Nombre del Proveedor" name="proveedor" value="{{$proveedorview->nombre_proveedor}}"
                    pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="3" maxlength="25">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Descripción del Proveedor</label>
                    <input type="text" class="form-control" placeholder="Descripción del Proveedor" name="descripcion" value="{{$proveedorview->descripcion}}"
                    required pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="3" maxlength="60">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Telefono del Proveedor</label>
                    <input type="number" class="form-control" placeholder="Telefono del Proveedor" name="telefono" value="{{$proveedorview->telefono}}"
                     required minlength="8" maxlength="8">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Empresa perteneciente del Proveedor</label>
                    <input type="text" class="form-control" placeholder="Empresa perteneciente del Proveedor" name="empresa" value="{{$proveedorview->nombre_empresa}}"
                    required pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="3" maxlength="60">
                  </div>
                </div>
                 <!-- Botones del formulario-->
                <div class="">
                  <input type="submit" value="Guardar" class="btn btn-primary " name="btnGuardarProveedor" id="btnGuardarProveedor">
                  <a type="submit" class="btn btn-danger" href="{{route('proveedorview')}}">Regresar</a>
                </div> 
            </form>
             <!--Aqui se termina el espacio donde se agregan todos los componente-->
          </div>
        </div>
  
      </section>

@endsection