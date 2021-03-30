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

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('administracion/descuentos','AdministracionDescuentoController');

Route::resource('administracion/organizacion/categoria','AdministracionCategoriaController');
Route::get('administracion/organizacion/categoria/{id}/baja', 'AdministracionCategoriaController@baja');
Route::get('administracion/organizacion/categoria/{id}/alta', 'AdministracionCategoriaController@alta');

Route::resource('administracion/organizacion/personal','AdministracionPersonalController');
Route::get('administracion/organizacion/personal/{id}/details', 'AdministracionPersonalController@details');
Route::get('administracion/organizacion/personal/{id}/alta', 'AdministracionPersonalController@alta');
Route::get('administracion/organizacion/personal/{id}/baja', 'AdministracionPersonalController@baja');

Route::resource('administracion/administrar_cuota','AdministracionCuotaOrganizacionController');

Route::resource('administracion/administrar_socio','AdministracionSocioController');

Route::resource('asociados/socio','SocioController');
Route::get('asociados/socio/{id}/details', 'SocioController@details');
Route::get('asociados/socio/inscripcion', 'SocioController@inscripcion');
Route::get('asociados/socio/{id}/inscripcion', 'SocioController@inscripcion');
Route::patch('asociados/socio/{id}/inscribir', 'SocioController@inscribir')->name('asociados.socio.inscribir');


Route::resource('taller','TallerController');
Route::get('taller/{id}/details', 'TallerController@details')->name('taller.details');
Route::patch('taller/{id}/profesional', 'TallerController@profesional')->name('taller.profesional');

Route::resource('seguridad/usuario', 'UsuarioController');

Route::resource('ingresos/cuota_organizacion','IngresoCuotaOrganizacionController');
Route::get('ingresos/cuota_organizacion/{id}/historial', 'IngresoCuotaOrganizacionController@historial');
Route::get('ingresos/cuota_organizacion/{id}/cuota_organizacion/edit', 'IngresoCuotaOrganizacionController@edit');

Route::resource('ingresos/cuota_taller','IngresoCuotaTallerController');
Route::get('ingresos/cuota_taller/{id}/listado_socios','IngresoCuotaTallerController@listado_socios');
Route::get('ingresos/cuota_taller/{id}/{id2}/nuevo_cupon', [
'as' => 'nuevo_cupon', 'uses' => 'IngresoCuotaTallerController@nuevo_cupon']);
Route::get('ingresos/cuota_taller/{id}/{id2}/nuevo_pago', [
'as' => 'nuevo_pago', 'uses' => 'IngresoCuotaTallerController@nuevo_pago']);
Route::patch('ingresos/cuota_taller/{id}/{id2}/importe_pago','IngresoCuotaTallerController@importe_pago')->name('ingresos.cuota_taller.importe_pago');

Route::resource('ingresos/varios','IngresoVariosController');

Route::resource('egresos/pago_profesional','EgresoPagoProfesionalController');
Route::get('egresos/pago_profesional/{id}/details', 'EgresoPagoProfesionalController@details')->name('egresos.pago_profesional.details');
Route::get('egresos/pago_profesional/{id}/info_pago', ['as'=>'info_pago', 'uses'=>'EgresoPagoProfesionalController@info_pago']);
Route::patch('egresos/pago_profesional/{id1}/{id2}/profesional', 'EgresoPagoProfesionalController@profesional')->name('egresos.pago_profesional.profesional');
Route::get('egresos/pago_profesional/{id1}/{id2}/pagar', ['as' => 'pagar', 'uses'=>'EgresoPagoProfesionalController@pagar']);
Route::patch('egresos/pago_profesional/{id}/emitir_pago', 'EgresoPagoProfesionalController@emitir_pago')->name('egresos.pago_profesional.emitir_pago');

Route::patch('egresos/pago_profesional/{id1}/{id2}/pagar2', 'EgresoPagoProfesionalController@pagar2')->name('egresos.pago_personal.pagar2');

Route::resource('egresos/pago_personal','EgresoPagoPersonalController');
Route::get('egresos/pago_personal/{id}/crear_pago', 'EgresoPagoPersonalController@crear_pago')->name('egresos.pago_personal.crear_pago');
Route::get('egresos/pago_personal/{id}/emitir_pago', 'EgresoPagoPersonalController@emitir_pago')->name('egresos.pago_personal.emitir_pago');
Route::get('egresos/pago_personal/{id}/{id1}/pagar/{id2}/{id3}', [
'as' => 'pago', 'uses' => 'EgresoPagoPersonalController@pagar']);
Route::get('egresos/pago_personal/{id}/{id2}/listado_pago', [
'as' => 'listado_pago', 'uses' => 'EgresoPagoPersonalController@listado_pago']);
Route::patch('egresos/pago_personal/importe_pago/{id}/{id1}/{id2}/{id3}','EgresoPagoPersonalController@importe_pago')->name('egresos.pago_personal.importe_pago');
Route::patch('egresos/pago_personal/{id}/personal', 'EgresoPagoPersonalController@personal')->name('egresos.pago_personal.personal');
Route::patch('egresos/pago_personal/{id}/emitir_pago', 'EgresoPagoPersonalController@emitir_pago')->name('egresos.pago_personal.emitir_pago');
Route::patch('egresos/pago_personal/{id}/{id2}/listado_pago', 'EgresoPagoPersonalController@listado_pago')->name('egresos.pago_personal.listado_pago');

Route::resource('egresos/gastos_varios','EgresoGastosVariosController');
Route::get('egresos/gastos_varios/{id}/details', 'EgresoGastosVariosController@details');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::auth();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::get('/{slug}', 'HomeController@index');


