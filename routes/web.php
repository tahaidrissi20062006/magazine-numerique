<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Models\Article; // تأكد من استدعاء الموديل في الأعلى



// Pages accessibles par tout le monde
Route::get('/', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');

// Pages accessibles UNIQUEMENT aux utilisateurs connectés
Route::middleware('auth')->group(function () {
    Route::get('/ajouter-article', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/sauvegarder-article', [ArticleController::class, 'store'])->name('article.store');
    Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::get('/dashboard', function () {
    return view('dashboard'); // تأكد من وجود هذا الملف في resources/views
})->name('dashboard');
});

require __DIR__.'/auth.php';