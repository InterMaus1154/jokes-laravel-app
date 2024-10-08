<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Joke;
use App\Models\User;
use Illuminate\Http\Request;

class JokeController extends Controller
{
    /**
     * Display create joke form
     * user.joke.create
     */
    public function create()
    {
        $this->authorize('create', Joke::class);
        return view('joke.create-joke-form');
    }
}
