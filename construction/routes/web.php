<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceitaAReceberController;
use App\Http\Controllers\ReceitaController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//CRIAR RECEITAS

    Route::get('/receitas/store', [ReceitaController::class, 'store'])->name('receitas.index');
    Route::post('/receitas', [ReceitaController::class, 'store'])->name('receitas.store');

//VISUALIZAR RECEITAS

// routes/web.php
    Route::get('/receitas', [ReceitaController::class, 'index'])->name('receitas.index');


// Rota para Receitas a Receber
    Route::get('/receitas-a-receber', [ReceitaAReceberController::class, 'index'])->name('receitas-a-receber.index');
    Route::get('/receitas-a-receber/create', [ReceitaAReceberController::class, 'create'])->name('receitas-a-receber.create');
    Route::post('/receitas-a-receber', [ReceitaAReceberController::class, 'store'])->name('receitas-a-receber.store');
});

require __DIR__.'/auth.php';
