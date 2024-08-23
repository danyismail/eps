<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckSNController;
use App\Http\Controllers\LabaController;

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

// Route::get('/', function () {
//     return view('layout.template');
// });

Route::get('/login',            [UserController::class, 'Login'])->name('user.login');
Route::post('/auth',            [UserController::class, 'Auth'])->name('user.auth');
Route::get('/logout',           [UserController::class, 'Logout'])->name('user.logout');

Route::group(['middleware' => 'usersession'], function () {
    Route::get('/',                         [KpiController::class, 'index'])->name('kpi');
    Route::get('/kpi',                      [KpiController::class, 'index'])->name('kpi');
    Route::get('/saldo',                    [SaldoController::class, 'index'])->name('saldo');
    Route::get('/penjualan-periode',        [PenjualanController::class, 'Periode'])->name('penjualan.periode');
    Route::get('/penjualan',                [PenjualanController::class, 'index'])->name('penjualan');
    Route::get('/check-sn',                 [CheckSNController::class, 'index'])->name('check-sn');
    Route::get('/laba-reseller',            [LabaController::class, 'Reseller'])->name('laba.reseller');
    Route::get('/laba-reseller/{db}',       [LabaController::class, 'Reseller'])->name('laba.reseller');
    Route::get('/laba-harian',              [LabaController::class, 'Harian'])->name('laba.harian');
    Route::get('/laba-rugi',                [LabaController::class, 'Rugi'])->name('laba.rugi');
    Route::get('/user',                     [UserController::class, 'List'])->name('user.list');
    Route::post('/user/create',             [UserController::class, 'Create'])->name('user.create');
    Route::get('/user/delete',              [UserController::class, 'Delete'])->name('user.delete');
});