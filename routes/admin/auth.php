<?php
/*Authentication routes for admin users*/
/*Methods are used from Controllers/Admin/AuthController */

use App\Http\Controllers\admin\AuthController;

/*Show admin login form*/
Route::get('login', [AuthController::class, 'showLogin'])->name('admin.view.login');

/*Admin login action*/
Route::post('login', [AuthController::class, 'login'])->name('admin.auth.login');
