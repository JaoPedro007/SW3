<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

/*Rotas para Departamento*/

Route::get('departamentos', [\App\Http\Controllers\DepartamentoController::class, 'index']) ->name('departamento/index');
Route::get('departamentos/cadastrar', [\App\Http\Controllers\DepartamentoController::class, 'create']) ->name('departamento/create');
Route::post('departamentos/salvar', [\App\Http\Controllers\DepartamentoController::class, 'store'])->name('departamento/index');
Route::get('departamentos/{id}/editar', [\App\Http\Controllers\DepartamentoController::class, 'edit'])->name('departamento/edit');
Route::put('departamentos/{id}/salvar', [\App\Http\Controllers\DepartamentoController::class, 'update'])->name('departamento/index');
Route::delete('departamentos/{id}', [\App\Http\Controllers\DepartamentoController::class, 'destroy'])->name('departamento/index');

/*Rotas para Marca*/

Route::get('marcas', [\App\Http\Controllers\MarcaController::class, 'index']) ->name('marca/index');
Route::get('marcas/cadastrar', [\App\Http\Controllers\MarcaController::class, 'create']) ->name('marca/create');
Route::post('marcas/salvar', [\App\Http\Controllers\MarcaController::class, 'store'])->name('marca/index');
Route::get('marcas/{id}/editar', [\App\Http\Controllers\MarcaController::class, 'edit'])->name('marca/edit');
Route::put('marcas/{id}/salvar', [\App\Http\Controllers\MarcaController::class, 'update'])->name('marca/index');
Route::delete('marcas/{id}', [\App\Http\Controllers\MarcaController::class, 'destroy'])->name('marca/index');

/*Rotas para Produto*/

Route::get('produtos', [\App\Http\Controllers\ProdutoController::class, 'index']) ->name('produto/index');
Route::get('produtos/cadastrar', [\App\Http\Controllers\ProdutoController::class, 'create']) ->name('produto/create');
Route::post('produtos/salvar', [\App\Http\Controllers\ProdutoController::class, 'store'])->name('produto/index');
Route::get('produtos/{id}/editar', [\App\Http\Controllers\ProdutoController::class, 'edit'])->name('produto/edit');
Route::put('produtos/{id}/salvar', [\App\Http\Controllers\ProdutoController::class, 'update'])->name('produto/index');
Route::delete('produtos/{id}', [\App\Http\Controllers\ProdutoController::class, 'destroy'])->name('produto/index');

/*Rotas para Cliente*/

Route::get('clientes', [\App\Http\Controllers\ClienteController::class, 'index']) ->name('cliente/index');
Route::get('clientes/cadastrar', [\App\Http\Controllers\ClienteController::class, 'create']) ->name('cliente/create');
Route::post('clientes/salvar', [\App\Http\Controllers\ClienteController::class, 'store'])->name('cliente/index');
Route::get('clientes/{id}/editar', [\App\Http\Controllers\ClienteController::class, 'edit'])->name('cliente/edit');
Route::put('clientes/{id}/salvar', [\App\Http\Controllers\ClienteController::class, 'update'])->name('cliente/index');
Route::delete('clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'destroy'])->name('cliente/index');


/*Rotas para Usuário*/

Route::get('usuarios', [\App\Http\Controllers\UserController::class, 'index']) ->name('usuario/index');
Route::get('usuarios/cadastrar', [\App\Http\Controllers\UserController::class, 'create']) ->name('usuario/create');
Route::post('usuarios/salvar', [\App\Http\Controllers\UserController::class, 'store'])->name('usuario/index');
Route::get('usuarios/{id}/{id2}/editar', [\App\Http\Controllers\UserController::class, 'edit'])->name('usuario/edit');
Route::put('usuarios/{id}/salvar', [\App\Http\Controllers\UserController::class, 'update'])->name('usuario/index');
Route::delete('usuarios/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('usuario/index');



/*Rotas para Venda*/

Route::get('vendas', [\App\Http\Controllers\VendaController::class, 'produtoseClienteModal'])->name('telaInicial');
Route::get('adicionarProdutosTabela', [\App\Http\Controllers\VendaController::class, 'adicionarProduto'])->name('adicionarProdutosTabela');



Route::post('vendas/salvar', [\App\Http\Controllers\UserController::class, 'store'])->name('usuario/index');



Route::get('/home', function () {
    return view('home/home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/clientes', function () {
    return view('cliente/index');
})->middleware(['auth', 'verified'])->name('cliente');

Route::get('/produtos', function () {
    return view('produto/index');
})->middleware(['auth', 'verified'])->name('produto');

Route::get('/usuarios', function () {
    return view('usuario/index');
})->middleware(['auth', 'verified'])->name('usuario');

Route::get('/marcas', function () {
    return view('marca/index');
})->middleware(['auth', 'verified'])->name('marca');

Route::get('/departamentos', function () {
    return view('departamento/index');
})->middleware(['auth', 'verified'])->name('departamento');


Route::middleware('auth')->group(function () {
    Route::get('/clientes', [\App\Http\Controllers\ClienteController::class, 'index'])->name('cliente/index');
    Route::get('/produtos', [\App\Http\Controllers\ProdutoController::class, 'index'])->name('produto/index');
    Route::get('/usuarios', [\App\Http\Controllers\UserController::class, 'index'])->name('usuario/index');
    Route::get('/marcas', [\App\Http\Controllers\MarcaController::class, 'index'])->name('marca/index');
    Route::get('/departamentos', [\App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamento/index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
