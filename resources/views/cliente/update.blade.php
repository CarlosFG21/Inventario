@extends('layout.plantilla')

@section('contenido')


  <!--Encabezado solo muestra el nombre del modulo arriba-->
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Clientes</h1>
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div><!--Terminacion del modulo del encabezad-->

  <!--Inicio del fondo donde iran todos los componetes del formulario-->
     <section class="content">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Formulario de actualización de clientes</h3> 
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
         
          <!--Aqui se agregaran todos los componente de los inputs del formulario como los botones tambien-->
          <form action="{{route('clienteupdate',$clienteviews->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombre del cliente</label>
                  <input type="text" class="form-control" placeholder="Nombre del Cliente" name="cliente" value="{{$clienteviews->nombre_completo}}"
                  pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="3" maxlength="55">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Direccion</label>
                  <input type="text" class="form-control" placeholder="Direccion del Cliente" name="direccion" value="{{$clienteviews->direccion}}"
                  required pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="3" maxlength="60">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Nit</label>
                  <input type="text" class="form-control" placeholder="Nit del Cliente" name="nit" value="{{$clienteviews->nit}}"
                   required minlength="9" maxlength="9">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Telefono</label>
                  <input type="number" class="form-control" placeholder="Telefono del Cliente" name="telefono" value="{{$clienteviews->telefono}}"
                  required minlength="8" maxlength="8">
                </div>
              </div>
               <!-- Botones del formulario-->
              <div class="">
                <input type="submit" value="Guardar" class="btn btn-primary " name="btnGuardarCliente" id="btnGuardarCliente">
                <a type="submit" class="btn btn-danger" href="{{route('clienteview')}}">Regresar</a>
              </div> 
          </form>
           <!--Aqui se termina el espacio donde se agregan todos los componente-->
        </div>
      </div>

    </section>
    
@endsection