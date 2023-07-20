<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\KasController;
use App\Http\Controllers\API\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/masuk', [AuthController::class, 'login']);
Route::post('/mlebu', [LoginController::class, 'login']);
// Route::middleware('auth:sanctum')->group(function () {
Route::post('/logout', [AuthController::class, 'logout']);
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });

//     Route::get('/wilayah', [WilayahApiController::class, 'index']);
    // Route::get('/kas', [KasController::class, 'index']);
    // Route::get('/kas', [KasController::class, 'index']);
    // Route::get('/wilayah', [WilayahController::class, 'index']);

    Route::get('/kas_masuk', [KasController::class, 'kasMasuk'])->name('kas.masuk');
    Route::get('/semua_kas', [KasController::class, 'semuaKas'])->name('semua.kas');
    Route::get('/kas_keluar', [KasController::class, 'kasKeluar'])->name('kas.keluar');
    Route::get('/add_kas', [KasController::class, 'create']);
    Route::post('/post_kas', [KasController::class, 'store'])->name('kas.store');
    Route::get('/show_kas/{id}', [KasController::class, 'show'])->name('kas.show');
    Route::get('/delete_kas/{id}', [KasController::class, 'hapus'])->name('hapus.kas');
// });