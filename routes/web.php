<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/diagnostica', 'DiagnosticaController@index')->name('diagnostica');

Route::get('/index', 'HomeController@index')->name('home');

Route::post('/diagnostica', 'DiagnosticaController@predict')->name('diagnostica.predict');

Route::get('/reportes', 'ReportesController@index')->name('reportes');

//Configuración usuaria

Route::get('/perfil','ConfigUserController@index')->name('perfil');

Route::post('/actualizarUsuario','ConfigUserController@update')->name('perfil.update');

////CRUD Equipos

Route::get('/equipos','EquiposController@index')->name('equipos');

Route::post('/registrarEquipo','EquiposController@store')->name('equipos.store');

Route::post('/borrarEquipo','EquiposController@destroy')->name('equipos.delete');

Route::post('/actualizarEquipo','EquiposController@update')->name('equipos.update');

////CRUD Servicios

Route::get('/ordenesServicio','ServiciosController@index')->name('servicios');

Route::post('/registrarOrdenesServicio','ServiciosController@store')->name('servicios.store');

Route::post('/borrarOrdenesServicio','ServiciosController@destroy')->name('servicios.delete');

Route::post('/actualizarOrdenesServicio','ServiciosController@update')->name('servicios.update');

////CRUD Revisiones

Route::get('/revisiones','RevisionesController@index')->name('revisiones');

Route::post('/registrarRevisiones','RevisionesController@store')->name('revisiones.store');

Route::post('/borrarRevisiones','RevisionesController@destroy')->name('revisiones.delete');

Route::post('/actualizarRevisiones','RevisionesController@update')->name('revisiones.update');

////CRUD Insumos

Route::get('/insumos','InsumosController@index')->name('insumos');

Route::post('/registrarInsumos','InsumosController@store')->name('insumos.store');

Route::post('/borrarInsumos','InsumosController@destroy')->name('insumos.delete');

Route::post('/actualizarInsumos','InsumosController@update')->name('insumos.update');


////CRUD Ventas

Route::get('/ventas','VentasController@index')->name('ventas');

Route::post('/registrarVentas','VentasController@store')->name('ventas.store');

Route::post('/borrarVentas','VentasController@destroy')->name('ventas.delete');

Route::post('/actualizarVentas','VentasController@update')->name('ventas.update');

////CRUD Proveedores

Route::get('/proveedores','ProveedoresController@index')->name('proveedores');

Route::post('/registrarProveedores','ProveedoresController@store')->name('proveedores.store');

Route::post('/borrarProveedores','ProveedoresController@destroy')->name('proveedores.delete');

Route::post('/actualizarProveedores','ProveedoresController@update')->name('proveedores.update');

////CRUD Clientes

Route::get('/usuarios','UsuariosController@index')->name('usuarios');

Route::post('/registrarUsuarios','UsuariosController@store')->name('usuarios.store');

Route::post('/borrarUsuarios','UsuariosController@destroy')->name('usuarios.delete');

Route::post('/actualizarUsuarios','UsuariosController@update')->name('usuarios.update');

//Reportes

Route::get('/reportepredfecha', 'ReportesController@prediccionesFecha')->name('reportepredfecha');

Route::get('/reportusuarios', 'ReportesController@prediccionesUsuario')->name('reportusuarios');

Route::get('/reportfallasoft', 'ReportesController@prediccionesFallaSoft')->name('reportfallasoft');

Route::get('/reportfallahard', 'ReportesController@prediccionesFallaHard')->name('reportfallahard');


//Reportes PDF

Route::get('/reportepredfecha.pdf', 'ReportesController@prediccionesFechaPdf')->name('reportepredfecha.pdf');

Route::get('/reportusuarios.pdf', 'ReportesController@prediccionesUsuarioPdf')->name('reportusuarios.pdf');

Route::get('/reportfallasoft.pdf', 'ReportesController@prediccionesFallaSoftPdf')->name('reportfallasoft.pdf');

Route::get('/reportfallahard,pdf', 'ReportesController@prediccionesFallaHardPdf')->name('reportfallahard.pdf');
