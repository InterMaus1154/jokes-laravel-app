<?php

use App\Http\Controllers\user\JokeController as UserJokeController;

/*Show create joke form*/
Route::get('joke/create', [UserJokeController::class, 'create'])->name('user.joke.create');
