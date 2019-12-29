<?php
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/diagnostica', 'DiagnosticaController@index')->name('diagnostica')->middleware('auth');
Route::post('/diagnostica', 'DiagnosticaController@predict')->name('diagnostica.predict')->middleware('auth');
Route::get('/reportes', 'ReportesController@index')->name('reportes')->middleware('auth')->middleware('onlyadminortech');

//Configuración usuaria

Route::get('/perfil','ConfigUserController@index')->name('perfil')->middleware('auth');
Route::post('/actualizarUsuario','ConfigUserController@update')->name('perfil.update')->middleware('auth');

////CRUD Equipos

Route::get('/equipos','EquiposController@index')->name('equipos')->middleware('auth')->middleware('notclient');
Route::post('/registrarEquipo','EquiposController@store')->name('equipos.store')->middleware('auth')->middleware('notclient');
Route::post('/borrarEquipo','EquiposController@destroy')->name('equipos.delete')->middleware('auth')->middleware('notclient');
Route::post('/actualizarEquipo','EquiposController@update')->name('equipos.update')->middleware('auth')->middleware('notclient');

////CRUD Servicios

Route::get('/ordenesServicio','ServiciosController@index')->name('servicios')->middleware('auth')->middleware('notclient');
Route::post('/registrarOrdenesServicio','ServiciosController@store')->name('servicios.store')->middleware('auth')->middleware('notclient');
Route::post('/borrarOrdenesServicio','ServiciosController@destroy')->name('servicios.delete')->middleware('auth')->middleware('notclient');
Route::post('/actualizarOrdenesServicio','ServiciosController@update')->name('servicios.update')->middleware('auth')->middleware('notclient');
Route::post('/imprimirServicio','ServiciosController@update')->name('servicios.pdf')->middleware('auth')->middleware('notclient');

////CRUD Revisiones

Route::get('/revisiones','RevisionesController@index')->name('revisiones')->middleware('auth')->middleware('onlyadminortech');
Route::post('/registrarRevisiones','RevisionesController@store')->name('revisiones.store')->middleware('auth')->middleware('onlyadminortech');
Route::post('/borrarRevisiones','RevisionesController@destroy')->name('revisiones.delete')->middleware('auth')->middleware('onlyadminortech');
Route::post('/actualizarRevisiones','RevisionesController@update')->name('revisiones.update')->middleware('auth')->middleware('onlyadminortech');

////CRUD Insumos

Route::get('/insumos','InsumosController@index')->name('insumos')->middleware('auth')->middleware('notclient');
Route::post('/registrarInsumos','InsumosController@store')->name('insumos.store')->middleware('auth')->middleware('notclient');
Route::post('/borrarInsumos','InsumosController@destroy')->name('insumos.delete')->middleware('auth')->middleware('notclient');
Route::post('/actualizarInsumos','InsumosController@update')->name('insumos.update')->middleware('auth')->middleware('notclient');

////CRUD Ventas

Route::get('/ventas','VentasController@index')->name('ventas')->middleware('auth')->middleware('notclient');
Route::post('/registrarVentas','VentasController@store')->name('ventas.store')->middleware('auth')->middleware('notclient');
Route::post('/borrarVentas','VentasController@destroy')->name('ventas.delete')->middleware('auth')->middleware('notclient');
Route::post('/actualizarVentas','VentasController@update')->name('ventas.update')->middleware('auth')->middleware('notclient');

////CRUD Proveedores

Route::get('/proveedores','ProveedoresController@index')->name('proveedores')->middleware('auth')->middleware('notclient');
Route::post('/registrarProveedores','ProveedoresController@store')->name('proveedores.store')->middleware('auth')->middleware('notclient');
Route::post('/borrarProveedores','ProveedoresController@destroy')->name('proveedores.delete')->middleware('auth')->middleware('notclient');
Route::post('/actualizarProveedores','ProveedoresController@update')->name('proveedores.update')->middleware('auth')->middleware('notclient');

////CRUD Clientes

Route::get('/usuarios','UsuariosController@index')->name('usuarios')->middleware('auth')->middleware('onlyadmin');
Route::post('/registrarUsuarios','UsuariosController@store')->name('usuarios.store')->middleware('auth')->middleware('onlyadmin');
Route::post('/borrarUsuarios','UsuariosController@destroy')->name('usuarios.delete')->middleware('auth')->middleware('onlyadmin');
Route::post('/actualizarUsuarios','UsuariosController@update')->name('usuarios.update')->middleware('auth')->middleware('onlyadmin');

//Reportes

Route::get('/reportepredfecha', 'ReportesController@prediccionesFecha')->name('reportepredfecha')->middleware('auth')->middleware('onlyadminortech');
Route::get('/reportusuarios', 'ReportesController@prediccionesUsuario')->name('reportusuarios')->middleware('auth')->middleware('onlyadminortech');
Route::get('/reportfallasoft', 'ReportesController@prediccionesFallaSoft')->name('reportfallasoft')->middleware('auth')->middleware('onlyadminortech');
Route::get('/reportfallahard', 'ReportesController@prediccionesFallaHard')->name('reportfallahard')->middleware('auth')->middleware('onlyadminortech');

//Reportes PDF

Route::get('/reportepredfecha.pdf', 'ReportesController@prediccionesFechaPdf')->name('reportepredfecha.pdf')->middleware('auth')->middleware('onlyadminortech');
Route::get('/reportusuarios.pdf', 'ReportesController@prediccionesUsuarioPdf')->name('reportusuarios.pdf')->middleware('auth')->middleware('onlyadminortech');
Route::get('/reportfallasoft.pdf', 'ReportesController@prediccionesFallaSoftPdf')->name('reportfallasoft.pdf')->middleware('auth')->middleware('onlyadminortech');
Route::get('/reportfallahard,pdf', 'ReportesController@prediccionesFallaHardPdf')->name('reportfallahard.pdf')->middleware('auth')->middleware('onlyadminortech');