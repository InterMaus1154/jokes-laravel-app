<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJokeRequest;
use App\Http\Requests\UpdateJokeRequest;
use App\Models\Joke;
use App\Models\JokeTag;
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

    /**
     * Store new joke
     * user.joke.store
     */
    public function store(StoreJokeRequest $request)
    {
        $this->authorize('create', Joke::class);

        //create slug from question
        $jokeQuestion = $request->validated('joke_question');

        $jokeSlug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', trim($jokeQuestion)));

        $jokeSlug = $jokeSlug .'-'. now()->format('Y-m-d').strtolower(\Str::random(8));

        //store new joke
        $joke = Joke::create([
            'user_id' => auth()->user()->user_id,
            'joke_slug' => $jokeSlug,
            'joke_question' => $request->validated('joke_question'),
            'joke_answer' => $request->validated('joke_answer'),
            'is_adult' => $request->boolean('is_adult')
        ]);

        //check if joke was created successfully
        if ($joke) {
            //refresh to get joke id
            $joke = $joke->refresh();

            //check if joke tags are present
            if ($request->has('joke_tags')) {
                foreach ($request->input('joke_tags') as $jokeTag) {
                    JokeTag::create([
                        'joke_id' => $joke->joke_id,
                        'tag_id' => $jokeTag
                    ]);
                }
            }

            return redirect()->back()->with('success', 'New joke created successfully!');
        }

        return redirect()->back()->withErrors(['error' => 'Error at creating new joke!']);
    }

    /**
     * Show edit form
     * user.joke.edit
     */
    public function edit(Joke $joke)
    {
        $this->authorize('update', [Joke::class, $joke]);
        return view('joke.update-joke-form', compact('joke'));
    }

    /**
     * Update joke
     */
    public function update(UpdateJokeRequest $request, Joke $joke)
    {
        $this->authorize('update', [Joke::class, $joke]);

        //attempt update
        $isUpdated = $joke->update([
            'joke_question' => $request->validated('joke_question'),
            'joke_answer' => $request->validated('joke_answer'),
            'is_adult' => $request->boolean('is_adult')
        ]);

        //check if updated successfully
        if($isUpdated){
            return redirect()->back()->with('success', 'Joke updated successfully!');
        }

        return redirect()->back()->withErrors(['error' => 'Error at updating joke!']);
    }
}
