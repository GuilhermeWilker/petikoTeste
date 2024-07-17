<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;

Route::middleware('auth')->group(function () {
    Route::get('/',  [HomeController::class, 'index'])
        ->name('home');

    Route::get('/archived', [HomeController::class, 'archived'])
        ->name('archived');

    Route::post('/task', [TaskController::class, 'store'])
        ->name('task.store');

    Route::put('/task/{task}', [TaskController::class, 'update'])
        ->name('task.update');

    Route::delete('/task/{task}', [TaskController::class, 'destroy'])
        ->name('task.destroy');

    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
});

Route::get("/admin", [AdminController::class, 'index'])
    ->middleware(AdminMiddleware::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
