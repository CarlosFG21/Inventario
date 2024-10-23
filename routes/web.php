<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerProveedor;
use App\Http\Controllers\ControllerCliente;
use App\Http\Controllers\ControllerProducto;
use App\Http\Controllers\ControllerEntrada;
use App\Http\Controllers\ControllerSalida;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('bienvenido');
    });

    // Rutas para Proveedores (acceso para admin y user)
    Route::middleware(RoleMiddleware::class.':admin,user')->group(function () {
        Route::get('/create_proveedor', function() {
            return view('proveedor.create');
        })->name('proveedorcreate');

        Route::post('/guardar-proveedor', [ControllerProveedor::class, 'GuardarProveedor'])->name('guardarproveedor');
        Route::get('view_proveedor', [ControllerProveedor::class, 'MostrarProveedor'])->name('proveedorview');
        Route::get('editar-proveedor/{id}', [ControllerProveedor::class, 'VisualizarProveedor'])->name('proveedoreditar');
        Route::put('editar-proveedor/{id}/', [ControllerProveedor::class, 'ActualizaProveedor'])->name('proveedorupdate');
        Route::put('eliminar-proveedor/{id}', [ControllerProveedor::class, 'DesactivarProveedor'])->name('proveedordelete');
        Route::put('reactivar-proveedor/{id}', [ControllerProveedor::class, 'ReactivarProveedor'])->name('proveedorreactivar');
    });

    // Rutas para Clientes (acceso para admin y user)
    Route::middleware(RoleMiddleware::class.':admin,user')->group(function () {
        Route::get('/create_cliente', function() {
            return view('cliente.create');
        })->name('clientecreate');

        Route::post('/guardar-cliente', [ControllerCliente::class, 'GuardarCliente'])->name('guardarcliente');
        Route::get('view_cliente', [ControllerCliente::class, 'MostrarCliente'])->name('clienteview');
        Route::get('editar-cliente/{id}', [ControllerCliente::class, 'VisualizarCliente'])->name('clienteditar');
        Route::put('editar-cliente/{id}/', [ControllerCliente::class, 'ActualizarCliente'])->name('clienteupdate');
        Route::put('eliminar-cliente/{id}', [ControllerCliente::class, 'EliminarCliente'])->name('clientedelete');
        Route::put('reactivar-cliente/{id}', [ControllerCliente::class, 'ReactivarCliente'])->name('reactivarcliente');
    });

    // Rutas para Productos (solo acceso para admin)
    Route::middleware(RoleMiddleware::class.':admin')->group(function () {
        Route::get('/create_producto', function() {
            return view('producto.create');
        })->name('productocreate');

        Route::post('/guardar-producto', [ControllerProducto::class, 'GuardarProducto'])->name('guardarproducto');
        Route::get('view_producto', [ControllerProducto::class, 'MostrarProductos'])->name('productoview');
        Route::get('editar-producto/{id}', [ControllerProducto::class, 'VisualizarProducto'])->name('productoeditar');
        Route::put('editar-producto/{id}/', [ControllerProducto::class, 'EditarProducto'])->name('productoupdate');
        Route::put('eliminar-producto/{id}', [ControllerProducto::class, 'EliminarProducto'])->name('productodelete');
        Route::put('reactivar-producto/{id}', [ControllerProducto::class, 'ReactivarProducto'])->name('productoreactivar');
    });

    // Rutas para Entradas (acceso para admin y user)
    Route::middleware(RoleMiddleware::class.':admin,user')->group(function () {
        Route::get('entrada_producto', [ControllerEntrada::class, 'Modales'])->name('entredaproducto');
        Route::post('/guardar-entrada', [ControllerEntrada::class, 'GuardarDatosE'])->name('guardarEntrada');
        Route::get('/view_entrada', [ControllerEntrada::class, 'MostrarEntradas'])->name('entradaWiew');
    });

    // Rutas para Salidas (acceso para admin y user)
    Route::middleware(RoleMiddleware::class.':admin,user')->group(function () {
        Route::get('salida_producto', [ControllerSalida::class, 'ObtenterDatos'])->name('salidaproducto');
        Route::get('/view_salida', [ControllerSalida::class, 'MostrarSalida'])->name('salidaView');
        Route::post('/guardar-salida', [ControllerSalida::class, 'GuardarSalidas'])->name('guardarSalida');
    });
});
