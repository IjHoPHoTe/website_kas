<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KomisariatController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Auth::routes();
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/dashboard', [WebController::class, 'index']);
    
    Route::get('/murid', [MuridController::class, 'index']);
    Route::get('/add_murid', [MuridController::class, 'create']);
    Route::post('/post_murid', [MuridController::class, 'store'])->name('murid.store');
    Route::get('/edit_murid/{id}', [MuridController::class, 'edit'])->name('edit.murid');
    Route::post('/update_murid/{id}', [MuridController::class, 'update'])->name('update.murid');
    Route::get('/delete/{id}', [MuridController::class, 'hapus'])->name('hapus.murid');
    
    Route::get('/wilayah', [WilayahController::class, 'index']);
    Route::get('/add_wilayah', [WilayahController::class, 'create']);
    Route::post('/post_wilayah', [WilayahController::class, 'store'])->name('wilayah.store');
    Route::get('/edit_wilayah/{id}', [WilayahController::class, 'edit'])->name('edit.wilayah');
    Route::post('/update_wilayah/{id}', [WilayahController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [WilayahController::class, 'hapus'])->name('hapus.wilayah');
    
    Route::get('/komisariat', [KomisariatController::class, 'index']);
    Route::get('/add_komisariat', [KomisariatController::class, 'create']);
    Route::post('/post_komisariat', [KomisariatController::class, 'store'])->name('komisariat.store');
    Route::get('/edit_komisariat/{id}', [KomisariatController::class, 'edit'])->name('edit.komisariat');
    Route::post('/update_komisariat/{id}', [KomisariatController::class, 'update'])->name('update.komisariat');
    Route::get('/delete_kom/{id}', [KomisariatController::class, 'hapus'])->name('hapus.kom');

    Route::get('/kas_masuk', [KasController::class, 'kasMasuk'])->name('kas.masuk');
    Route::get('/kas_keluar', [KasController::class, 'kasKeluar'])->name('kas.keluar');
    Route::get('/add_kas', [KasController::class, 'create']);
    Route::post('/post_kas', [KasController::class, 'store'])->name('kas.store');

});