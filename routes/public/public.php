<?php
use App\Http\Controllers\public\ViewController;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\public\UserController as PublicUserController;
use App\Http\Controllers\public\JokeController as PublicJokeController;
/*Public routes*/


/*Index route*/
Route::get('/', [ViewController::class, 'index'])->name('public.index');

/*Show login page*/
Route::get('login', [AuthController::class, 'showLogin'])->name('user.view.login');

/*Login route*/
Route::post('login', [AuthController::class, 'login'])->name('user.auth.login');

/*Show register form*/
Route::get('register', [AuthController::class, 'showRegister'])->name('user.view.register');

/*Register*/
Route::post('register', [AuthController::class, 'register'])->name('user.auth.register');

/*View a user's profile*/
Route::get('/profile/{user}', [PublicUserController::class, 'show'])->name('public.view.profile');

/*Joke detail page*/
Route::get('/joke/{joke}', [PublicJokeController::class, 'show'])->name('public.view.joke');
