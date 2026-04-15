<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;




//gialam-feature/user-crud

// LIST
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// CREATE (ĐẶT TRÊN)
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

// EDIT
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

// VIEW DETAIL (ĐẶT DƯỚI)
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// UPDATE
Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');

// DELETE
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');

Route::get('/', function () {
    return view('welcome');
});
