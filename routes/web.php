<?php

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

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre', [\App\Http\Controllers\SobreNosController::class, 'sobre'])->name('site.sobre');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::get('/login', function(){ return 'Login';})->name('site.login');

// app

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){ return 'Clientes';})->name('site.clientes');
    Route::get('/fornecedores', function(){ return 'Fornecedores';})->name('site.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos';})->name('app.produtos');
});

Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

 Route::get('/rota2', function(){ // redirecionamento no contexto de uma rota
    return redirect()->route('site.rota1');
})->name('site.rota2');

//Route::redirect('/rota2', '/rota1');

Route::fallback(function(){ // rota de contigência
    echo 'A rota acessada não existe, <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});

