<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EditorialesController;
use App\Http\Controllers\LibrosController;

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
    return view('auth.login');
});

Route::resource('autor',AutoresController::class);
Route::resource('categoria',CategoriasController::class);
Route::resource('editorial',EditorialesController::class);
Route::resource('libro',LibrosController::class);

Auth::routes();

Route::get('/home', [AutoresController::class, 'index'])->name('home');

//Redirije al usuario cuando se loguea
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [AutoresController::class, 'index'])->name('home');
});
