<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJokeRequest;
use App\Http\Requests\UpdateJokeRequest;
use App\Models\Joke;
use App\Models\User;

class JokeController extends Controller
{

    /**
     * Display the specified resource.
     * public.view.joke
     */
    public function show(Joke $joke)
    {
        $joke->loadCount('jokeComments')->load('jokeTags.tag');
        return view('joke.joke-page', compact('joke'));
    }


}
