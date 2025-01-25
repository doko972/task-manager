<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('/tache/creer', [TaskController::class, 'create'])->name('create');

Route::post('/tache/creer-post', [TaskController::class, 'store'])->name('store');

Route::get('/tache/modifier/{id}', [Taskcontroller::class, 'edit'])->name ('edit');

Route::put('/tache/update/{id}', [TaskController::class, 'update'])->name('update');

Route::delete('/tache/supprimer/{id}', [TaskController::class, 'destroy'])->name('destroy');