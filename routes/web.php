<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\EscalaController;
use App\Http\Controllers\EscalaVoluntarioController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\TestemunhoController;
use App\Http\Controllers\VoluntarioController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ConfiguracaoController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PastorController;
use App\Http\Controllers\Admin\PropositoController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Middleware\VerifyCsrfToken;

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
Route::get('/seminario', [OfertaController::class, 'seminario'])->name('seminario');
Route::get('/pix', [OfertaController::class, 'pix'])->name('pix');
Route::get('/testemunhos', [TestemunhoController::class, 'list'])->name('testemunhos.list');
Route::post('/testemunhos', [TestemunhoController::class, 'store'])->name('testemunhos.store');
Route::get('/escalas', [EscalaController::class, 'list'])->name('escalas.list');
Route::post('/voluntarios', [EscalaVoluntarioController::class, 'store'])
    ->name('escalaVoluntario.store')
    ->withoutMiddleware([VerifyCsrfToken::class]);

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/home', [IndexController::class, 'index'])->name('home');
    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

    //Propósitos
    Route::get('/propositos/{proposito}/editar', [PropositoController::class, 'edit'])->name('propositos.edit');
    Route::put('/propositos/{proposito}', [PropositoController::class, 'update'])->name('propositos.update');

    //Banners
    Route::get('/banners/adicionar', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banners/{banner}/editar', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/banners/{banner}', [BannerController::class, 'update'])->name('banners.update');
    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');

    //Pastor
    Route::get('/pastor/{pastor}/editar', [PastorController::class, 'edit'])->name('pastor.edit');
    Route::put('/pastor/{pastor}', [PastorController::class, 'update'])->name('pastor.update');

    //Testemunhos
    Route::get('/testemunhos', [TestemunhoController::class, 'index'])->name('testemunhos');
    Route::get('/testemunhos/{testemunho}/editar', [TestemunhoController::class, 'edit'])->name('testemunhos.edit');
    Route::put('/testemunhos/{testemunho}', [TestemunhoController::class, 'update'])->name('testemunhos.update');
    Route::get('/testemunhos/{testemunho}/ativar', [TestemunhoController::class, 'enable'])->name('testemunhos.enable');
    Route::get('/testemunhos/{testemunho}/desativar', [TestemunhoController::class, 'disable'])->name('testemunhos.disable');

    //Eventos
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos');
    Route::get('/eventos/adicionar', [EventoController::class, 'create'])->name('eventos.create');
    Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
    Route::get('/eventos/{evento}/editar', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::put('/eventos/{evento}', [EventoController::class, 'update'])->name('eventos.update');
    Route::delete('/eventos/{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy');

    //Escalas
    Route::get('/escalas', [EscalaController::class, 'index'])->name('escalas');
    Route::get('/escalas/adicionar', [EscalaController::class, 'create'])->name('escalas.create');
    Route::post('/escalas', [EscalaController::class, 'store'])->name('escalas.store');
    Route::get('/escalas/{escala}/editar', [EscalaController::class, 'edit'])->name('escalas.edit');
    Route::put('/escalas/{escala}', [EscalaController::class, 'update'])->name('escalas.update');
    Route::delete('/escalas/{escala}', [EscalaController::class, 'destroy'])->name('escalas.destroy');

    //Escala-Voluntário
    Route::put('/escala-voluntario/{voluntario}', [EscalaVoluntarioController::class, 'update'])->name('escalaVoluntario.update');
    Route::delete('/escala-voluntario/{voluntario}', [EscalaVoluntarioController::class, 'destroy'])
        ->name('escalaVoluntario.destroy')
        ->withoutMiddleware([VerifyCsrfToken::class]);

    //Voluntários
    Route::get('/voluntarios', [VoluntarioController::class, 'index'])->name('voluntarios');
    Route::get('/voluntarios/adicionar', [VoluntarioController::class, 'create'])->name('voluntarios.create');
    Route::post('/voluntarios', [VoluntarioController::class, 'store'])->name('voluntarios.store');
    Route::get('/voluntarios/{voluntario}/editar', [VoluntarioController::class, 'edit'])->name('voluntarios.edit');
    Route::put('/voluntarios/{voluntario}', [VoluntarioController::class, 'update'])->name('voluntarios.update');
    Route::delete('/voluntarios/{voluntario}', [VoluntarioController::class, 'destroy'])->name('voluntarios.destroy');

    //Usuários
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
    Route::get('/usuarios/adicionar', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{banner}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

    //Configurações
    Route::get('/configuracoes', [ConfiguracaoController::class, 'index'])->name('configuracoes');
    Route::put('/configuracoes/{usuario}', [ConfiguracaoController::class, 'update'])->name('configuracoes.update');
});

require __DIR__ . '/auth.php';
