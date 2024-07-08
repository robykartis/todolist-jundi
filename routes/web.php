<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TodolistController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/store', [AuthController::class, 'store'])->name('auth.store');
Route::get('/login/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Index Todolist
    Route::get('/todolist', [TodolistController::class, 'index'])->name('todolist.index');
    // Create Todolist
    Route::get('/todolist/create', [TodolistController::class, 'create'])->name('todolist.create');
    // Store Todolist
    Route::post('/todolist/store', [TodolistController::class, 'store'])->name('todolist.store');
    // Show Todolist
    Route::get('/todolist/show/{id}', [TodolistController::class, 'show'])->name('todolist.show');
    // Edit Todolist
    Route::get('/todolist/edit/{id}', [TodolistController::class, 'edit'])->name('todolist.edit');
    // Update Todolist
    Route::post('/todolist/update/{id}', [TodolistController::class, 'update'])->name('todolist.update');
    // Delete Todolist
    Route::delete('/todolist/delete/{id}', [TodolistController::class, 'destroy'])->name('todolist.destroy');


    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
