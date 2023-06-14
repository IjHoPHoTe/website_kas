<?php

use App\Http\Controllers\AuthController;
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

    Route::get('/wilayah', [WilayahController::class, 'index']);

});
