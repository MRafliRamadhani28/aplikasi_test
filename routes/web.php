<?php

use App\Http\Controllers\CategoryCOAController;
use App\Http\Controllers\DashboardController;
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

Route::resource('category-coa', CategoryCOAController::class)->except('create', 'show', 'edit');
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('category-coa/readData', [CategoryCOAController::class, 'readData']);
Route::get('category-coa/showForm', [CategoryCOAController::class, 'showForm']);