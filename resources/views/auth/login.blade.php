<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inventario</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css?v=3.2.0')}}">


</head>
<body class="hold-transition login-page">
<div class="login-box">

<div class="card card-outline card-primary">
<div class="card-header text-center">
<a href="" class="h1"><b>Inventario</b></a>
</div>
<div class="card-body">
<p class="login-box-msg">Inicio de Sesión</p>
<form action="{{route('login')}}" method="post">
    @csrf
<div class="input-group mb-3">
<input type="email" class="form-control" placeholder="Email" name="email">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" placeholder="Password" name="password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">
<div class="icheck-primary">
</div>
</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Iniciar sesion</button>
</div>

</div>
</form>
<div class="social-auth-links text-center mt-2 mb-3">

</div>

<p class="mb-1">
<a href="forgot-password.html"></a>
</p>
<p class="mb-0">
<a href="register.html" class="text-center"></a>
</p>
</div>

</div>

</div>


<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('adminlte/dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>
</html>