<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Auth\AuthMiddleware;
use App\Http\Middleware\Auth\IsRestrictedMiddleware;
use App\Http\Middleware\Auth\AdminMiddleware;
use App\Http\Controllers\public\ViewController;
use App\Http\Controllers\user\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Redirect / to public/ */
Route::get('/', fn() => redirect(route('public.index')));

/*Forbidden response route - 403*/
Route::get('/403', [ViewController::class, 'forbiddenResponse'])->name('auth.403');

/*Unauthorized response route - 401*/
Route::get('/401', [ViewController::class, 'unauthorizedResponse'])->name('auth.401');

/*Public routes are prefix with /public/ */
Route::prefix('public')
    ->group(base_path('routes/public/public.php'));

/*Register auth routes*/
/*Admin auth routes*/
Route::group(['prefix' => 'admin'], function () {
    Route::prefix('auth')
        ->group(base_path('routes/admin/auth.php'));
});

/*User auth routes*/
Route::group(['prefix' => 'user'], function(){
    Route::prefix('auth')
        ->group(base_path('routes/user/auth.php'));
});

/*global logout route*/
Route::post('logout', [AuthController::class, 'logout'])->name('user.auth.logout');

/*Routes that require a logged-in user (any) that is not restricted*/
Route::middleware([AuthMiddleware::class, IsRestrictedMiddleware::class])
    ->group(function () {
        /*Admin routes*/
        Route::prefix('admin')
            ->middleware(AdminMiddleware::class)
            ->group(base_path('routes/admin/admin.php'));

        /*Logged-in user routes*/
        Route::prefix('user')
            ->group(base_path('routes/user/user.php'));
    });
