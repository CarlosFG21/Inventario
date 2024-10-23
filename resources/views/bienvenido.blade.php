@extends('layout.plantilla')

@section('contenido')

  <!--Encabezado solo muestra el nombre del modulo arriba-->
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div><!--Terminacion del modulo del encabezad-->

  <!--Inicio del fondo donde iran todos los componetes del formulario-->
     <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Inicio del Sistema</h3> 
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">

          <!--Aqui se agregaran todos los componente de los inputs del formulario como los botones tambien-->
          <h4>Bienvenido al Sistema de Inventario</h4>
           <!--Aqui se termina el espacio donde se agregan todos los componente-->
        </div>
      </div>

    </section>
    
@endsection