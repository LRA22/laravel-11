<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;


Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
    Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

});

require __DIR__.'/auth.php';
