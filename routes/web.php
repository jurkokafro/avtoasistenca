<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/domov', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/oddaja-vozila', [App\Http\Controllers\OddajaAvtomobilaController::class, 'index'])->name('oddaja-vozila');

Route::get('/oddaja-vozila', [App\Http\Controllers\OddajaAvtomobilaController::class, 'show'])->name('oddaja-vozila.show');
Route::post('/oddaja-vozila', [App\Http\Controllers\OddajaAvtomobilaController::class, 'store'])->name('oddaja-vozila.store');
Route::get('/oddaja-vozila/create', [App\Http\Controllers\OddajaAvtomobilaController::class, 'create'])->name('oddaja-vozila.create');

Route::get('dodaj-vozilo', [App\Http\Controllers\DodajVoziloController::class, 'show'])->name('dodaj-vozilo.show');
Route::post('dodaj-vozilo', [App\Http\Controllers\DodajVoziloController::class, 'store'])->name('dodaj-vozilo.store');
Route::get('dodaj-vozilo/create', [App\Http\Controllers\DodajVoziloController::class, 'create'])->name('dodaj-vozilo.create');

Route::get('pregled-izposoj', [App\Http\Controllers\PregledIzposojController::class, 'show'])->name('pregled-izposoj.show');

Route::get('prevzem-vozila', [App\Http\Controllers\PrevzemVozilaController::class, 'show'])->name('prevzem-vozila.show');

Route::get('izbris-vozila/delete', [App\Http\Controllers\IzbrisVozilaController::class, 'delete'])->name('izbris-vozila.delete');
Route::get('izbris-vozila', [App\Http\Controllers\IzbrisVozilaController::class, 'show'])->name('izbris-vozila.show');



