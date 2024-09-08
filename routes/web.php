<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;

// Authentication routes provided by Breeze
require __DIR__.'/auth.php';

// Redirect logged-in users to the Todo app
Route::get('/', [TodoController::class, 'index'])->name('todos.index')->middleware('auth');

// Add new todo
Route::post('/todos/add', [TodoController::class, 'add'])->name('todos.add')->middleware('auth');

// Edit a todo
Route::get('/todos/edit/{index}', [TodoController::class, 'edit'])->name('todos.edit')->middleware('auth');

// Update a todo
Route::post('/todos/update', [TodoController::class, 'update'])->name('todos.update')->middleware('auth');

// Delete a todo
Route::get('/todos/delete/{index}', [TodoController::class, 'delete'])->name('todos.delete')->middleware('auth');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Define the dashboard route
Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure this view exists
})->name('dashboard')->middleware('auth');