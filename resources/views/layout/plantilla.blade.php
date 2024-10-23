<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Inventario</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Usuario
        </a>
        <div class="dropdown-menu" aria-labelledby="userDropdown">
          <!-- Información del usuario -->
          <a class="dropdown-item" href="#">Perfil</a>
          <a class="dropdown-item" href="#">Configuración</a>
      
          <!-- Botón de cerrar sesión -->
          <form action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" class="dropdown-item" style="border: none; background: none; padding: 0;">
                  <i class="fas fa-sign-out-alt"></i> Cerrar sesión
              </button>
          </form>
      </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventario</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->     
          <li class="nav-item">
            <a href="{{route('productoview')}}" class="nav-link">
              <i class="fas fa-cube nav-icon"></i>
              <p>Productos</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('proveedorview')}}" class="nav-link">
              <i class="fas fa-address-book nav-icon"></i>
              <p>Proveedor</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('clienteview')}}" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>Clientes</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('salidaView')}}" class="nav-link">
              <i class="fas fa-shopping-cart nav-icon"></i>
              <p>Salidas</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('entradaWiew')}}" class="nav-link">
              <i class="fas fa-tags nav-icon"></i>
              <p>Entradas</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-plus nav-icon"></i>
              <p>Usuarios</p>
            </a>
          </li>
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @yield('contenido')

    <!-- Main content -->
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css" />

<script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>

<script>
  $(function () {
    $("#datatable").DataTable({
      "responsive": true,
      "autoWidth": false,
      language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar ",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
    });
  });
</script>

<script>
  $(function () {
    $("#datatable2").DataTable({
      "responsive": true,
      "autoWidth": false,
      language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar ",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
    });
  });

  $(function () {
    $("#datatable3").DataTable({
      "responsive": true,
      "autoWidth": false,
      language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar ",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
    });
  });
</script>

<script>
  $(function () {
    $("#mytable").DataTable({
      "responsive": true,
      "autoWidth": false,
      language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
    });
  });
</script>

<!--Funcion para pasar los datos del producto al formulario-->
<script>
  //Inicializacion del datable
  $(document).ready(function() {
    $('#datatable').DataTable();
   

   $(document).on('click', '.select-btn', function() {
    console.log("Botón clickeado");
    // Obtén la fila que contiene el botón seleccionado
    var row = $(this).closest('tr');

    // Extrae los datos de las celdas
    var idproduct = row.find('td:eq(0)').text();
    var nombreproducto = row.find('td:eq(1)').text();
    var cantidadproduc = row.find('td:eq(3)').text();

    // Rellena los campos del formulario
    $('#idproducto').val(idproduct);
    $('#producto').val(nombreproducto);
    $('#cantidadisponible').val(cantidadproduc);
    

  });
});

 </script>

 <!--Funcion para pasar los datos del producto al formulario pero con precio-->
<script>
  //Inicializacion del datable
  $(document).ready(function() {
    $('#datatable').DataTable();
   

   $(document).on('click', '.select-btn4', function() {
    console.log("Botón clickeado");
    // Obtén la fila que contiene el botón seleccionado
    var row = $(this).closest('tr');

    // Extrae los datos de las celdas
    var idproduct = row.find('td:eq(0)').text();
    var nombreproducto = row.find('td:eq(1)').text();
    var cantidadproduc = row.find('td:eq(3)').text();
    var precio = row.find('td:eq(4)').text();

    // Rellena los campos del formulario
    $('#idproducto').val(idproduct);
    $('#producto').val(nombreproducto);
    $('#cantidadisponible').val(cantidadproduc);
    $('#precio').val(precio);
    

  });
});

 </script>

<script>
  //Inicializacion del datable
  $(document).ready(function() {
    $('#datatable2').DataTable();
   

   $(document).on('click', '.select-btn2', function() {
    console.log("Botón clickeado");
    // Obtén la fila que contiene el botón seleccionado
    var row = $(this).closest('tr');

    // Extrae los datos de las celdas
    var idproveedor = row.find('td:eq(0)').text();
    var nombreproveedor= row.find('td:eq(1)').text();
   

    // Rellena los campos del formulario
    $('#idproveedor').val(idproveedor);
    $('#proveedor').val(nombreproveedor);
   

  });
});
 </script>

<script>
  //Inicializacion del datable
  $(document).ready(function() {
    $('#datatable3').DataTable();
   

   $(document).on('click', '.select-btn2', function() {
    console.log("Botón clickeado");
    // Obtén la fila que contiene el botón seleccionado
    var row = $(this).closest('tr');

    // Extrae los datos de las celdas
    var idcliente = row.find('td:eq(0)').text();
    var nombrecliente= row.find('td:eq(1)').text();
   

    // Rellena los campos del formulario
    $('#idcliente').val(idcliente);
    $('#cliente').val(nombrecliente);
   

  });
});
 </script>
 
 <!--Funcion para agregar en la tabla entrada y mandar a guardar-->
 @stack('scripts')

</body>
</html>


