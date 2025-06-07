<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\CestaBasicaController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{user}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    Route::get('/usuarios/{user}', [UserController::class, 'show'])->name('usuarios.show');

    Route::get('/usuarios/relatorio/pdf', [UserController::class, 'gerarRelatorioPDF'])->name('usuarios.relatorio.pdf');

    Route::resource('doacoes', DoacaoController::class)->parameters([
        'doacoes' => 'doacao',
    ]);;
    
    Route::get('/doacoes/relatorio/pdf', [DoacaoController::class, 'gerarRelatorioPDF'])->name('doacoes.relatorio.pdf');

    Route::resource('eventos', EventoController::class)->middleware('auth');
    Route::get('/eventos/relatorio/pdf', [EventoController::class, 'gerarRelatorioPDF'])->name('eventos.relatorio.pdf');


    Route::resource('cestas', CestaBasicaController::class)->parameters([
        'cestas' => 'cesta',
    ]);;
    Route::get('/cestas/relatorio/pdf', [CestaBasicaController::class, 'gerarRelatorioPDF'])->name('cestas.relatorio.pdf');


    Route::get('/cestas/{cesta}/entregar', [CestaBasicaController::class, 'entregar'])->name('cestas.entregar.form');
    Route::post('/cestas/{cesta}/entregar', [CestaBasicaController::class, 'salvarEntrega'])->name('cestas.entregar');


});

Route::get('/sobre-nos', function () {
    return view('sobre-nos');
})->name('sobre-nos');

Route::get('/contato', function () {
    return view('contato');
})->name('contato');


require __DIR__.'/auth.php';
