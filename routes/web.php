<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FinanzasController;
use App\Http\Controllers\PatrociniosController;
use App\Http\Controllers\InversionesController;

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
