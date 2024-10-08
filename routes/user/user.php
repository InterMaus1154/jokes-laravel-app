<?php

use App\Http\Controllers\user\JokeController as UserJokeController;

/*Joke prefixed routes, with joke controller*/
Route::prefix('joke')
    ->controller(UserJokeController::class)
    ->group(function(){
        /*Show create joke form*/
        Route::get('create', 'create')->name('user.joke.create');

        /*Store new joke*/
        Route::post('store', 'store')->name('user.joke.store');

    });

