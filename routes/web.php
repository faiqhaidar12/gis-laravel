<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\SekolahController;

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

Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Kecamatan
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::get('/kecamatan/add', [KecamatanController::class, 'add']);
Route::post('/kecamatan/insert', [KecamatanController::class, 'insert']);
Route::get('/kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit']);
Route::post('/kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);
Route::get('/kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete']);

//Jenjang
Route::get('/jenjang', [JenjangController::class, 'index'])->name('jenjang');
Route::get('/jenjang/add', [JenjangController::class, 'add']);
Route::post('/jenjang/insert', [JenjangController::class, 'insert']);
Route::get('/jenjang/edit/{id_jenjang}', [JenjangController::class, 'edit']);
Route::post('/jenjang/update/{id_jenjang}', [JenjangController::class, 'update']);
Route::get('/jenjang/delete/{id_jenjang}', [JenjangController::class, 'delete']);

//Sekolah
Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah');
Route::get('/sekolah/add', [SekolahController::class, 'add']);
Route::post('/sekolah/insert', [SekolahController::class, 'insert']);
