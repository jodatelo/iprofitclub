<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FinanzasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PatrociniosController;
use App\Http\Controllers\InversionesController;
use App\Http\Controllers\RetirosController;

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
Route::get('/register/{referral?}', [App\Http\Controllers\Auth\RegisterController::class, 'registerPage'])->name('registerPage');


//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/',  'App\Http\Controllers\FinanzasController@index')->name('finanzas.index');
Route::get('/index',  'App\Http\Controllers\FinanzasController@index')->name('finanzas.index');

//Route::resource('/finanzas',  FinanzasController::class);
Route::get('/finanzas',  'App\Http\Controllers\FinanzasController@index')->name('finanzas.index');
Route::get('/finanzas/enviar',  'App\Http\Controllers\FinanzasController@enviar')->name('finanzas.enviar');
Route::post('/finanzas/store',  'App\Http\Controllers\FinanzasController@store')->name('finanzas.store');
Route::post('/finanzas/comprar',  'App\Http\Controllers\FinanzasController@comprar')->name('finanzas.comprar');
Route::get('/finanzas/compras',  'App\Http\Controllers\FinanzasController@compras')->name('finanzas.compras');
Route::get('/finanzas/retiros',  'App\Http\Controllers\FinanzasController@retiros')->name('finanzas.retiros');
Route::post('/finanzas/solicitar',  'App\Http\Controllers\FinanzasController@solicitar')->name('finanzas.solicitar');

Route::get('/usuarios',  'App\Http\Controllers\UsuarioController@index')->name('usuarios.index');
Route::post('/usuarios/destroy',  'App\Http\Controllers\UsuarioController@destroy')->name('usuarios.destroy');

Route::get('/retiros',  'App\Http\Controllers\RetirosController@index')->name('retiros.index');
Route::post('/retiros/destroy',  'App\Http\Controllers\RetirosController@destroy')->name('retiros.destroy');
Route::post('/retiros/{id}/aceptar',  'App\Http\Controllers\RetirosController@aceptar')->name('retiros.aceptar');
Route::post('/retiros/{id}/eliminar',  'App\Http\Controllers\RetirosController@eliminar')->name('retiros.eliminar');


Route::get('/acreditaciones',  'App\Http\Controllers\AcreditacionesController@index')->name('acreditaciones.index');
Route::get('/acreditaciones/acreditar',  'App\Http\Controllers\AcreditacionesController@acreditar')->name('acreditaciones.acreditar');
Route::post('/acreditaciones/destroy',  'App\Http\Controllers\AcreditacionesController@destroy')->name('acreditaciones.destroy');
Route::post('/acreditaciones/{id}/aceptar',  'App\Http\Controllers\AcreditacionesController@aceptar')->name('acreditaciones.aceptar');
Route::post('/acreditaciones/{id}/eliminar',  'App\Http\Controllers\AcreditacionesController@eliminar')->name('acreditaciones.eliminar');
Route::post('/acreditaciones/store',  'App\Http\Controllers\AcreditacionesController@store')->name('acreditaciones.store');


//Route::resource('/patrocinios',  PatrociniosController::class);
Route::get('/patrocinios',  'App\Http\Controllers\PatrociniosController@index')->name('patrocinios.index');
Route::get('/patrocinios/{id}/cobrar',  'App\Http\Controllers\PatrociniosController@cobrar')->name('patrocinios.cobrar');

Route::resource('/inversiones',  InversionesController::class);

Route::post('/inversiones/create', [App\Http\Controllers\InversionesController::class, 'create'])->name('create');
Route::get('/inversiones/{id}/{inv}/cobrar',  'App\Http\Controllers\InversionesController@cobrar')->name('polizas.cobrar');
 
 
//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [HomeController::class, 'index'])->name('index');
//Route::resource('/finanzas', FinanzasController::class);
