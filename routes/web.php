<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

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


    Route::get('/texts', [AuthorController::class, 'index'])->name('texts.index');
    Route::get('/texts/create', [AuthorController::class, 'create'])->name('texts.create');
    Route::post('/texts', [AuthorController::class, 'store'])->name('texts.store');


    Route::get('/compare', [CompareController::class, 'index'])->name('compare.index');
    Route::get('/compare/compare', [CompareController::class, 'compare'])->name('compare.compare');

    Route::post('/generate-text', [OpenAIController::class, 'generate']);


});


require __DIR__.'/auth.php';
