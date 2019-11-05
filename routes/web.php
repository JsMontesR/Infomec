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


Route::get('/perfil','ConfigUserController@index')->name('perfil');

Route::post('/actualizarUsuario/','ConfigUserController@update')->name('perfil.update');


Route::get('/equipos','EquiposController@index')->name('equipos');
Route::post('/equipo','EquiposController@store')->name('equipos.store');
//Route::delete('/equipo/{id}','EquiposController@destroy')->name('equipos.delete');
//Route::update('/equipo/{id}','EquiposController@update')->name('equipos.update');





Route::get('/reportepredfecha', 'ReportesController@prediccionesFecha')->name('reportepredfecha');

Route::get('/reportusuarios', 'ReportesController@prediccionesUsuario')->name('reportusuarios');

Route::get('/reportfallasoft', 'ReportesController@prediccionesFallaSoft')->name('reportfallasoft');

Route::get('/reportfallahard', 'ReportesController@prediccionesFallaHard')->name('reportfallahard');



Route::get('/reportepredfecha.pdf', 'ReportesController@prediccionesFechaPdf')->name('reportepredfecha.pdf');

Route::get('/reportusuarios.pdf', 'ReportesController@prediccionesUsuarioPdf')->name('reportusuarios.pdf');

Route::get('/reportfallasoft.pdf', 'ReportesController@prediccionesFallaSoftPdf')->name('reportfallasoft.pdf');

Route::get('/reportfallahard,pdf', 'ReportesController@prediccionesFallaHardPdf')->name('reportfallahard.pdf');
