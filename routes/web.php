<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagenController;

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
    return view('layout\layout');
    //return view('welcome');
});
Route::POST('mostrar', [ImagenController::class, 'mostrar'])->name('mostrar_imagen');
Route::POST('mostrar_ofi', [ImagenController::class, 'mostrar_oficialia'])->name('mostrar_ofi');
Route::GET('ver/{RCB}', [ImagenController::class, 'ver'])->name('ver_imagen');

//Route::POST('mostrar_rcb', [ImagenController::class, 'mostrar_depto_RCB'])->name('mostrar_imagen_rcb');
Route::POST('mostrar_rcb', [ImagenController::class, 'visualizarRCB'])->name('mostrar_imagen_rcb');

Route::POST('listar', [ImagenController::class, 'listar'])->name('listar_imagen');
Route::GET('pantalla', [ImagenController::class, 'index'])->name('pantalla_index');
Route::GET('imagen/{depto}/{RCB}/{nro}/{batchid}', [ImagenController::class, 'mostrar_base64'])->name('imagen_base54');
Route::GET('img_excep/{depto}/{RCB}/{nro}/{batchid}', [ImagenController::class, 'imagen_excepcion'])->name('imagen_excepcion');
Route::GET('registros/{oficialia}/{libro}/{categoria}', [ImagenController::class, 'registros'])->name('imagen_registros');





