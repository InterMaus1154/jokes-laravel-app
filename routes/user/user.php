<?php

use App\Http\Controllers\user\JokeController as UserJokeController;
use App\Http\Controllers\user\TagController as UserTagController;

/*Joke prefixed routes, with joke controller*/
Route::prefix('joke')
    ->controller(UserJokeController::class)
    ->group(function(){
        /*Show create joke form*/
        Route::get('create', 'create')->name('user.joke.create');

        /*Store new joke*/
        Route::post('store', 'store')->name('user.joke.store');

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
