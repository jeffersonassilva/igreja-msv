<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\Admin\IndexController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/album/{url}', [AlbumController::class, 'show'])->name('album');
Route::get('/ofertas', [OfertaController::class, 'index'])->name('ofertas');
Route::get('/pix', [OfertaController::class, 'pix'])->name('pix');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');

    Route::get('/home', [IndexController::class, 'index'])->name('home');
    Route::get('/propositos', [IndexController::class, 'propositos'])->name('propositos');
    Route::get('/propositos/{id}/edit', [IndexController::class, 'propositosEdit'])->name('propositos.edit');
    Route::post('/propositos/{id}/update', [IndexController::class, 'propositosUpdate'])->name('propositos.update');
});

require __DIR__.'/auth.php';
