<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\CestaBasicaController;
use App\Http\Controllers\VoluntarioController;
use App\Http\Controllers\AdminVoluntarioController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\IsVoluntarioAdm;
use App\Http\Middleware\IsVoluntarioExt;
use App\Http\Controllers\ContatoController;

/**
 * Registrando alias para middlewares customizados
 */
app('router')->aliasMiddleware('admin', AdminMiddleware::class);
app('router')->aliasMiddleware('is_voluntario_adm', IsVoluntarioAdm::class);
app('router')->aliasMiddleware('is_voluntario_ext', IsVoluntarioExt::class);

/**
 * Rotas públicas
 */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sobre-nos', fn() => view('sobre-nos'))->name('sobre-nos');
Route::get('/contato', fn() => view('contato'))->name('contato');
Route::post('/contato', [ContatoController::class, 'enviar'])->name('contato.enviar');

/**
 * Cadastro de voluntários externos (público)
 */
Route::get('/voluntariado', [VoluntarioController::class, 'create'])->name('voluntariado.create');
Route::post('/voluntariado', [VoluntarioController::class, 'store'])->name('voluntariado.store');

/**
 * Rotas acessíveis por qualquer usuário autenticado
 */
Route::middleware(['auth'])->group(function () {
    /**
     * Perfil (todos os tipos de usuários)
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Rotas exclusivas para ADMIN
 * Prefixo e name 'admin.' pois são de uso restrito
 */
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    /**
     * Gerenciamento de usuários
     */
    Route::resource('usuarios', UserController::class)->parameters(['usuarios' => 'user']);
    /**
     * Gerenciamento de voluntários pendentes
     */
    Route::get('voluntarios', [AdminVoluntarioController::class, 'index'])->name('voluntarios.index');
    Route::post('voluntarios/{id}/aprovar', [AdminVoluntarioController::class, 'aprovar'])->name('voluntarios.aprovar');
    Route::post('voluntarios/{id}/recusar', [AdminVoluntarioController::class, 'recusar'])->name('voluntarios.recusar');

    /**
     * Doações
     */
    Route::resource('doacoes', DoacaoController::class)->parameters(['doacoes' => 'doacao']);

    /**
     * Eventos
     */
    Route::resource('eventos', EventoController::class);
    Route::get('eventos/relatorio/pdf', [EventoController::class, 'gerarRelatorioPDF'])->name('eventos.relatorio.pdf');

    /**
     * Cestas Básicas
     */
    Route::resource('cestas', CestaBasicaController::class);
    Route::get('cestas/relatorio/pdf', [CestaBasicaController::class, 'gerarRelatorioPDF'])->name('cestas.relatorio.pdf');
    Route::get('cestas/{cesta}/entregar', [CestaBasicaController::class, 'entregar'])->name('cestas.entregar.form');
    Route::post('cestas/{cesta}/entregar', [CestaBasicaController::class, 'salvarEntrega'])->name('cestas.entregar');

    /**
     * Dashboard
     */
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

});

/**
 * Rotas para Voluntário Administrativo (acesso quase total, exceto exclusões)
 */
Route::middleware(['auth', 'is_voluntario_adm'])->group(function () {

    /**
     * Usuários - somente index, show, edit, update (sem create/destroy)
     */
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{user}', [UserController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{user}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');

    Route::get('usuarios/relatorio/pdf', [UserController::class, 'gerarRelatorioPDF'])->name('usuarios.relatorio.pdf');
    /**
     * Doações
     */
    Route::resource('doacoes', DoacaoController::class)->parameters(['doacoes' => 'doacao'])->except(['destroy']);
    Route::get('doacoes/relatorio/pdf', [DoacaoController::class, 'gerarRelatorioPDF'])->name('doacoes.relatorio.pdf');

    /**
     * Eventos
     */
    Route::resource('eventos', EventoController::class)->except(['destroy']);
    Route::get('eventos/relatorio/pdf', [EventoController::class, 'gerarRelatorioPDF'])->name('eventos.relatorio.pdf');

    /**
     * Cestas Básicas
     */
    Route::resource('cestas', CestaBasicaController::class)->except(['destroy']);
    Route::get('cestas/relatorio/pdf', [CestaBasicaController::class, 'gerarRelatorioPDF'])->name('cestas.relatorio.pdf');
    Route::get('cestas/{cesta}/entregar', [CestaBasicaController::class, 'entregar'])->name('cestas.entregar.form');
    Route::post('cestas/{cesta}/entregar', [CestaBasicaController::class, 'salvarEntrega'])->name('cestas.entregar');

    /**
     * Dashboard
     */
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    
});


require __DIR__.'/auth.php';
