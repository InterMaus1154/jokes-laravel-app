<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJokeCommentRequest;
use App\Http\Requests\UpdateJokeCommentRequest;
use App\Models\Joke;
use App\Models\JokeComment;
use App\Models\User;

class JokeCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJokeCommentRequest $request, Joke $joke)
    {
        $this->authorize('create', [User::class]);

        $user = auth()->user();

    }

    /**
     * Display the specified resource.
     */
    public function show(JokeComment $jokeComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JokeComment $jokeComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJokeCommentRequest $request, JokeComment $jokeComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JokeComment $jokeComment)
    {
        //
    }
}
