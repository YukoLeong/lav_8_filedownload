<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;

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

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::get('/products/store',[ProductController::class,'store'])->name('products.store');

Route::get('/export', [ExportController::class, 'index'])->name('export.index');
Route::get('/export/download_storage', [ExportController::class, 'download_storage'])->name('export.download_storage');
Route::get('/export/download_response', [ExportController::class, 'download_response'])->name('export.download_response');
Route::get('/export/csv_stream', [ExportController::class, 'csv_stream'])->name('export.csv_stream');