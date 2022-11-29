<?php

use App\Http\Controllers\CategoryCOAController;
use App\Http\Controllers\ChartofAccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
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

Route::get('dashboard', [DashboardController::class, 'index']);

Route::resource('category-coa', CategoryCOAController::class)->except('create', 'show', 'edit');
Route::get('category-coa/readData', [CategoryCOAController::class, 'readData']);
Route::get('category-coa/showForm', [CategoryCOAController::class, 'showForm']);

Route::resource('coa', ChartofAccountController::class)->except('create', 'show', 'edit');
Route::get('coa/readData', [ChartofAccountController::class, 'readData']);
Route::get('coa/showForm', [ChartofAccountController::class, 'showForm']);

Route::resource('transaksi', TransaksiController::class)->except('create', 'show', 'edit');
Route::get('transaksi/readData', [TransaksiController::class, 'readData']);
Route::get('transaksi/showForm', [TransaksiController::class, 'showForm']);

Route::resource('laporan', LaporanController::class)->except('create', 'show', 'edit');
Route::get('laporan/readData', [LaporanController::class, 'readData']);