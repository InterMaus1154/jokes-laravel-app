<?php

use App\Http\Controllers\user\JokeController as UserJokeController;
use App\Http\Controllers\user\TagController as UserTagController;
use App\Http\Controllers\user\UserController as UserUserController;

/*Joke prefixed routes, with joke controller*/
Route::prefix('joke')
    ->controller(UserJokeController::class)
    ->group(function(){
        /*Show create joke form*/
        Route::get('create', 'create')->name('user.joke.create');

        /*Store new joke*/
        Route::post('store', 'store')->name('user.joke.store');

        /*Show update joke form*/
        Route::get('edit/{joke}', 'edit')->name('user.joke.edit');

        /*Update joke*/
        Route::put('update/{joke}', 'update')->name('user.joke.update');

        /*Remove a joke*/
        Route::delete('delete/{joke}', 'destroy')->name('user.joke.delete');
    });

/*Tag prefixed routes, with tag controller*/
Route::prefix('tag')
    ->controller(UserTagController::class)
    ->group(function(){
        /*Show create tag form*/
        Route::get('create', 'create')->name('user.tag.create');

        /*Store new tag*/
        Route::post('store', 'store')->name('user.tag.store');
    });

/*Routes related to user, prefixed with profile*/
Route::prefix('profile')
    ->controller(UserUserController::class)
    ->group(function(){
        /*Edit user's own password view*/
        Route::get('password/edit', 'changePasswordView')->name('user.password.edit');

        /*Update password*/
        Route::patch('password/update', 'updatePassword')->name('user.password.update');

    });

