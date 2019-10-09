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

Auth::routes();

Route::get('/','HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/diagnostica', 'DiagnosticaController@index')->name('diagnostica');

Route::get('/index', 'HomeController@index')->name('home');

Route::post('diagnostica', 'DiagnosticaController@predict')->name('diagnostica.predict');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reportes', 'ReportesController@index')->name('reportes');

Route::get('/reportepredfecha', 'ReportesController@prediccionesFecha')->name('reportepredfecha');

Route::get('/reportusuarios', 'ReportesController@prediccionesUsuario')->name('reportusuarios');

Route::get('/reporte1', 'ReportesController@prediccionesFechaPdf')->name('reporte1.pdf');

Route::get('/reporte2', 'ReportesController@prediccionesUsuarioPdf')->name('reporte2.pdf');
