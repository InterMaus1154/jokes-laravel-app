<?php
use App\Http\Controllers\admin\UserController;

/*Admin routes*/
Route::get('/hello-world', fn() => "Hello world");

/*List users page*/
Route::get('/users', [UserController::class, 'index'])->name('admin.view.users');

/*Verify an unverified user*/
Route::patch('/verify/{user}', [UserController::class, 'verify'])->name('admin.user.verify');

/*Restrict a user*/
Route::patch('/restrict/{user}', [UserController::class, 'restrictUser'])->name('admin.user.restrict');

/*Make a user unrestricted*/
Route::patch('/unrestrict/{user}', [UserController::class, 'unrestrictUser'])->name('admin.user.unrestrict');
