<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PropositoController;

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
    Route::get('/home', [IndexController::class, 'index'])->name('home');
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

    //Propósitos
    Route::get('/propositos/{id}/edit', [PropositoController::class, 'edit'])->name('propositos.edit');
    Route::post('/propositos/{id}/update', [PropositoController::class, 'update'])->name('propositos.update');

    //Banners
    Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::post('/banners/{id}/update', [BannerController::class, 'update'])->name('banners.update');
});

require __DIR__.'/auth.php';
