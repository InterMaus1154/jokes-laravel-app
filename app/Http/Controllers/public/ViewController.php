<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Joke;
use App\Models\Tag;
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
        $jokes =
            Joke::with('jokeTags.tag:tag_id,tag_name,tag_color', 'user:user_id,username')
                ->withCount('jokeComments')
                ->when($request->has('tag'), function ($query) use ($request) {
                    $query->whereHas('jokeTags', function ($builder) use ($request) {
                        $builder->whereTagId($request->get('tag'));
                    });
                })
                ->when($request->has('joke_tags'), function($query)use($request){
                    $query->whereHas('jokeTags', function($builder)use($request){
                       $builder->whereIn('tag_id', $request->get('joke_tags'));
                    });
                })
                ->when($request->has('keywords'), function($query)use($request){
                    $keywords =  explode('/', $request->get('keywords'));
                    $query->where(function($query)use($keywords){
                        foreach ($keywords as $keyword) {
                            $query->orWhere('joke_question', 'LIKE', ' %'.$keyword.'%')
                            ->orWhere('joke_answer', 'LIKE', '%'.$keyword.'%');
                        }
                    });
                })
                ->orderBy('created_at', 'desc')
                ->paginate(Joke::$PAGINATION_COUNT);

        $tags = Tag::all('tag_id', 'tag_name', 'tag_color');

        return view('public.index', compact('jokes', 'tags'));
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

