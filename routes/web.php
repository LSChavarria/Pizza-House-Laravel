<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\MensajeClienteController;

Route::get('/welcome', function(){return view('welcome');})->name('PaginaPrincipal');

Route::get('/', [GeneralController::class, 'inicio'])->name('PaginaPrincipal');

/*  Administrador  */
Route::GET('/administracion', [GeneralController::class, 'administracion']) -> name('administracion');

Route::GET('/administracion/user', [UserController::class, 'user']) -> name('user');
Route::GET('/administracion/user/insert', [UserController::class, 'prepareInsertUser']) -> name('prepareInsertUser');
Route::POST('/administracion/user/insert/insertUser', [UserController::class, 'insertUser']) -> name('insertUser');
Route::POST('/administracion/user/update', [UserController::class, 'prepareUpdateUser']) -> name('prepareUpdateUser');
Route::POST('/administracion/user/update/updatetUser', [UserController::class, 'updateUser']) -> name('updateUser');
Route::POST('/administracion/user/delete', [UserController::class, 'deleteUser']) -> name('deleteUser');

Route::GET('/administracion/sucursal', [SucursalController::class, 'sucursal']) -> name('sucursal');
Route::GET('/administracion/sucursal/insert', [SucursalController::class, 'prepareInsertSucursal']) -> name('prepareInsertSucursal');
Route::POST('/administracion/sucursal/insert/insertSucursal', [SucursalController::class, 'insertSucursal']) -> name('insertSucursal');
Route::POST('/administracion/sucursal/update', [SucursalController::class, 'prepareUpdateSucursal']) -> name('prepareUpdateSucursal');
Route::POST('/administracion/sucursal/update/insertSucursal', [SucursalController::class, 'updateSucursal']) -> name('updateSucursal');
Route::POST('/administracion/sucursal/delete', [SucursalController::class, 'deleteSucursal']) -> name('deleteSucursal');

Route::GET('/administracion/promocion', [PromocionController::class, 'promocion']) -> name('promocion');
Route::GET('/administracion/promocion/insert', [PromocionController::class, 'prepareInsertPromocion']) -> name('prepareInsertPromocion');
Route::POST('/administracion/promocion/insert/insertPromocion', [PromocionController::class, 'insertPromocion']) -> name('insertPromocion');
Route::POST('/administracion/promocion/update', [PromocionController::class, 'prepareUpdatePromocion']) -> name('prepareUpdatePromocion');
Route::POST('/administracion/promocion/insert/updatePromocion', [PromocionController::class, 'updatePromocion']) -> name('updatePromocion');
Route::POST('/administracion/promocion/delete', [PromocionController::class, 'deletePromocion']) -> name('deletePromocion');

Route::GET('/administracion/pizza', [PizzaController::class, 'pizza']) -> name('pizza');
Route::GET('/administracion/pizza/insert', [PizzaController::class, 'prepareInsertPizza']) -> name('prepareInsertPizza');
Route::POST('/administracion/pizza/insert/insertPizza', [PizzaController::class, 'insertPizza']) -> name('insertPizza');
Route::POST('/administracion/pizza/update', [PizzaController::class, 'prepareUpdatePizza']) -> name('prepareUpdatePizza');
Route::POST('/administracion/pizza/update/updatePizza', [PizzaController::class, 'updatePizza']) -> name('updatePizza');
Route::POST('/administracion/pizza/delete', [PizzaController::class, 'deletePizza']) -> name('deletePizza');

Route::GET('/administracion/orden', [OrdenController::class, 'orden']) -> name('orden');
Route::GET('/administracion/orden/insert', [OrdenController::class, 'prepareInsertOrden']) -> name('prepareInsertOrden');
Route::POST('/administracion/orden/insert/insertOrden', [OrdenController::class, 'insertOrden']) -> name('insertOrden');
Route::POST('/administracion/orden/update', [OrdenController::class, 'prepareUpdateOrden']) -> name('prepareUpdateOrden');
Route::POST('/administracion/orden/update/updateOrden', [OrdenController::class, 'updateOrden']) -> name('updateOrden');
Route::POST('/administracion/orden/delete', [OrdenController::class, 'deleteOrden']) -> name('deleteOrden');

Route::GET('/administracion/mensaje_cliente', [MensajeClienteController::class, 'mensaje_cliente']) -> name('mensaje_cliente');
Route::GET('/administracion/mensaje_cliente/insert', [MensajeClienteController::class, 'prepareInsertMensajeCliente']) -> name('prepareInsertMensajeCliente');
Route::POST('/administracion/mensaje_cliente/insert/insertMensajeCliente', [MensajeClienteController::class, 'insertMensajeCliente']) -> name('insertMensajeCliente');
Route::POST('/administracion/mensaje_cliente/update', [MensajeClienteController::class, 'prepareUpdateMensajeCliente']) -> name('prepareUpdateMensajeCliente');
Route::POST('/administracion/mensaje_cliente/update/updateMensajeCliente', [MensajeClienteController::class, 'updateMensajeCliente']) -> name('updateMensajeCliente');
Route::POST('/administracion/mensaje_cliente/delete', [MensajeClienteController::class, 'deleteMensajeCliente']) -> name('deleteMensajeCliente');

/*  Cliente  */
Route::GET('/menu', [PizzaController::class, 'menu']) -> name('menu');

Route::GET('/ordenar', [OrdenController::class, 'ordenar']) -> name('ordenar');
Route::POST('/agregarOrden', [OrdenController::class, 'agregarOrden']) -> name('agregarOrden');
Route::POST('/generarOrden', [OrdenController::class, 'generarOrden'])->name('generarOrden');

Route::GET('/contacto', [MensajeClienteController::class, 'contacto'])->name('contacto');
Route::POST('/generarContacto', [MensajeClienteController::class, 'generarContacto'])->name('generarContacto');

Route::GET('/promociones', [PromocionController::class, 'promociones']) -> name('promociones');

Route::GET('/ubicacion', [SucursalController::class, 'ubicacion']) -> name('ubicacion');
Route::POST('/ubicacionSucursal', [SucursalController::class, 'ubicacionSucursal']) -> name('ubicacionSucursal');