<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Joke;
use Illuminate\Http\Request;

/**
 * Public view controller
 * Handles public requests
 * These actions don't require a logged-in user
 */
class ViewController extends Controller
{
    /**
     * Index page
     */
    public function index(Request $request)
    {
        $jokes = cache()->remember('joke-list', now()->addHours(1), function () use ($request) {
            return Joke::with('jokeTags.tag:tag_id,tag_name,tag_color', 'user:user_id,username')
                ->withCount('jokeComments')
                ->when($request->has('tag'), function ($query) use ($request) {
                    $query->whereHas('jokeTags', function ($builder) use ($request) {
                        $builder->whereTagId($request->get('tag'));
                    });
                })
                ->paginate(Joke::$PAGINATION_COUNT);
        });


        return view('public.index', compact('jokes'));
    }

    /**
     * Forbidden response for 403 requests
     */
    public function forbiddenResponse()
    {
        $message = session()->get('response_message', null);
        return view('restricted.403', compact('message'));
    }

    /**
     * Unauthorized response for 401 requests
     */
    public function unauthorizedResponse()
    {
        $message = session()->get('response_message', null);
        return view('restricted.401', compact('message'));
    }
}

