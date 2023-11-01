<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CartaoController;
use App\Http\Controllers\Admin\ConfiguracaoController;
use App\Http\Controllers\Admin\EscalaController;
use App\Http\Controllers\Admin\EventoController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\MembroController;
use App\Http\Controllers\Admin\PastorController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\PermissaoController;
use App\Http\Controllers\Admin\PropositoController;
use App\Http\Controllers\Admin\RelatorioController;
use App\Http\Controllers\Admin\RelatoriosTerourariaController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\VisitanteController;
use App\Http\Controllers\Admin\VoluntarioController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CampanhaController;
use App\Http\Controllers\EscalaVoluntarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotasFiscaisController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\TestemunhoController;
use App\Http\Middleware\VerifyCsrfToken;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/album/{url}', [AlbumController::class, 'show'])->name('album');
Route::get('/ofertas', [OfertaController::class, 'index'])->name('ofertas');
Route::get('/seminario', [OfertaController::class, 'seminario'])->name('seminario');
Route::get('/pix', [OfertaController::class, 'pix'])->name('pix');
Route::get('/testemunhos', [TestemunhoController::class, 'list'])->name('testemunhos.list');
Route::post('/testemunhos', [TestemunhoController::class, 'store'])->name('testemunhos.store');
Route::get('/escalas', [EscalaController::class, 'list'])->name('escalas.list');
Route::post('/voluntarios', [EscalaVoluntarioController::class, 'new'])->name('escalaVoluntario.new')->withoutMiddleware([VerifyCsrfToken::class]);

//Notas Fiscais
Route::get('/nfs', [NotasFiscaisController::class, 'access'])->name('notas-fiscais.access');
Route::get('/nfs/check', [NotasFiscaisController::class, 'check'])->name('notas-fiscais.check')->withoutMiddleware([VerifyCsrfToken::class]);
Route::get('/nfs/adicionar/{date}/{access_code}', [NotasFiscaisController::class, 'create'])->name('notas-fiscais.create')->withoutMiddleware([VerifyCsrfToken::class]);
Route::post('/nfs', [NotasFiscaisController::class, 'store'])->name('notas-fiscais.store');
//Route::get('/email-nfs', function () {
//    $nota = \App\Models\NotaFiscal::find(50);
//    $as = 'NF-' . $nota->id . '/' . str_replace('-', '', $nota->data) . '-' . str_pad($nota->categoria, 2, '0', STR_PAD_LEFT);
//    $nota['as'] = $as;
//    return view('emails.notas', ['nota' => $nota]);
//});
//
//Route::get('/email-visitantes', function () {
//    return view('emails.visitantes', ['visitante' => [
//        "dt_visita" => "2023-10-31",
//        "nome" => "Fulano da Silva",
//        "sexo" => "M",
//        "dt_nascimento" => "1975-10-05",
//        "endereco" => "QC 08 Rua A Casa 01",
//        "telefone" => "(61) 99239-4758",
//        "whatsapp" => "1",
//        "batizado" => "0",
//        "observacao" => "Teste de cadastro de visitantes"
//    ]]);
//});

//Visitantes
Route::get('/visitantes', [VisitanteController::class, 'create'])->name('visitantes.create');
Route::post('/visitantes', [VisitanteController::class, 'store'])->name('visitantes.store')->withoutMiddleware([VerifyCsrfToken::class]);

//Campanha de Daniel
Route::get('/campanha-de-daniel', [CampanhaController::class, 'index'])->name('campanha.index');
Route::post('/campanha-de-daniel', [CampanhaController::class, 'store'])->name('campanha.store')->withoutMiddleware([VerifyCsrfToken::class]);

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/site', [IndexController::class, 'site'])->name('site');
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

    //Visitantes
    Route::get('/visitantes', [VisitanteController::class, 'index'])->name('visitantes');
    Route::get('/visitantes/{visitante}/editar', [VisitanteController::class, 'edit'])->name('visitantes.edit');
    Route::put('/visitantes/{visitante}', [VisitanteController::class, 'update'])->name('visitantes.update');

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
    Route::post('/escala-voluntario', [EscalaVoluntarioController::class, 'store'])->name('escalaVoluntario.store');
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
    Route::get('/voluntarios/{voluntario}', [VoluntarioController::class, 'show'])->name('voluntarios.show');
    Route::delete('/voluntarios/{voluntario}', [VoluntarioController::class, 'destroy'])->name('voluntarios.destroy');

    //Relatorios
    Route::get('/relatorio/voluntarios', [RelatorioController::class, 'mensalVoluntarios'])->name('relatorio.mensal.voluntarios');
    Route::get('/relatorio/voluntarios/download', [RelatorioController::class, 'mensalVoluntariosDownload'])->name('relatorio.voluntarios.download');

    //Cartões
    Route::get('/cartoes', [CartaoController::class, 'index'])->name('cartoes');
    Route::get('/cartoes/adicionar', [CartaoController::class, 'create'])->name('cartoes.create');
    Route::post('/cartoes', [CartaoController::class, 'store'])->name('cartoes.store');
    Route::get('/cartoes/{cartao}/editar', [CartaoController::class, 'edit'])->name('cartoes.edit');
    Route::put('/cartoes/{cartao}', [CartaoController::class, 'update'])->name('cartoes.update');
    Route::delete('/cartoes/{cartao}', [CartaoController::class, 'destroy'])->name('cartoes.destroy');

    //Notas Fiscais
    Route::get('/notas-fiscais', [NotasFiscaisController::class, 'index'])->name('notas-fiscais');
    Route::delete('/notas-fiscais/{cartao}', [NotasFiscaisController::class, 'archive'])->name('notas-fiscais.archive');

    //Membros
    Route::get('/membros', [MembroController::class, 'index'])->name('membros');
    Route::get('/membros/adicionar', [MembroController::class, 'create'])->name('membros.create');
    Route::post('/membros', [MembroController::class, 'store'])->name('membros.store');
    Route::get('/membros/{membro}/editar', [MembroController::class, 'edit'])->name('membros.edit');
    Route::put('/membros/{membro}', [MembroController::class, 'update'])->name('membros.update');

    //Usuários
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
    Route::get('/usuarios/adicionar', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

    //Perfis
    Route::get('/perfis', [PerfilController::class, 'index'])->name('perfis');
    Route::get('/perfis/adicionar', [PerfilController::class, 'create'])->name('perfis.create');
    Route::post('/perfis', [PerfilController::class, 'store'])->name('perfis.store');
    Route::get('/perfis/{perfil}/editar', [PerfilController::class, 'edit'])->name('perfis.edit');
    Route::put('/perfis/{perfil}', [PerfilController::class, 'update'])->name('perfis.update');
    Route::delete('/perfis/{perfil}', [PerfilController::class, 'destroy'])->name('perfis.destroy');

    //Permissões
    Route::get('/permissoes', [PermissaoController::class, 'index'])->name('permissoes');
    Route::get('/permissoes/adicionar', [PermissaoController::class, 'create'])->name('permissoes.create');
    Route::post('/permissoes', [PermissaoController::class, 'store'])->name('permissoes.store');
    Route::get('/permissoes/{permissao}/editar', [PermissaoController::class, 'edit'])->name('permissoes.edit');
    Route::put('/permissoes/{permissao}', [PermissaoController::class, 'update'])->name('permissoes.update');

    //Relatórios Terouraria
    Route::get('/relatorios-tesouraria', [RelatoriosTerourariaController::class, 'index'])->name('relatorios-tesouraria');
    Route::get('/relatorio-tesouraria/por-cartao', [RelatoriosTerourariaController::class, 'relatorioPorCartaoPdf'])->name('relatorios-tesouraria.por-cartao');

    //Configurações
    Route::get('/configuracoes', [ConfiguracaoController::class, 'index'])->name('configuracoes');
    Route::put('/configuracoes/{usuario}', [ConfiguracaoController::class, 'update'])->name('configuracoes.update');
});

Route::get('/admin/{any}', function () {
    return redirect()->route('login');
})->where('any', '.*');

require __DIR__ . '/auth.php';
