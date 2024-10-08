<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Joke;
use App\Models\Tag;
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

        $tags = Tag::all('tag_id', 'tag_name', 'tag_color');

        return view('joke.create-joke-form', compact('tags'));
    }
}
