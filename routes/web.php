<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CetakPDFController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('tampilan', [
        'title' => 'Halaman Utama'
    ]);
})->middleware('guest');

Route::get('/login', [LoginController::class, 'index'] )->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'] );
Route::get('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard', LaporanController::class)->middleware('auth');

Route::resource('/akun', adminController::class)->middleware('admin');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/pdf', [CetakPDFController::class, 'exportPDF']);