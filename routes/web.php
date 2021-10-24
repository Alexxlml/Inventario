<?php

use App\Http\Controllers\ReportePDF;
use App\Http\Livewire\EditarProducto;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/registro', function () {
    return view('registro-producto');
})->name('registro');

Route::middleware(['auth:sanctum', 'verified'])->get('/bandeja', function () {
    return view('bandeja-producto');
})->name('bandeja');


Route::middleware(['auth:sanctum', 'verified'])->get('/reportes', function () {
    return view('reportes-producto');
})->name('reportes');


Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{id}', EditarProducto::class);

// ? ReportesPDF

Route::middleware(['auth:sanctum', 'verified'])->get('/pdf/reporte', [ReportePDF::class, 'createPDF']);