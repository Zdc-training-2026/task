<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('Auth.showRegister');
Route::post('/register',[AuthController::class, 'register'])    ->name('Auth.register');
Route::get('/login',    [AuthController::class, 'showLogin'])   ->name('Auth.showLogin');
Route::post('/login',   [AuthController::class, 'login'])       ->name('Auth.login');
Route::post('/logout',  [AuthController::class, 'logout'])      ->name('Auth.logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/tasks',            [TaskController::class, 'index'])   ->name('Task.index');
    Route::get('/tasks/create',     [TaskController::class, 'create'])  ->name('Task.create');
    Route::post('/tasks',           [TaskController::class, 'store'])   ->name('Task.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])   ->name('Task.edit');
    Route::put('/tasks/{task}',     [TaskController::class, 'update'])  ->name('Task.update');
    Route::delete('/tasks/{task}',  [TaskController::class, 'destroy']) ->name('Task.destroy');
});

