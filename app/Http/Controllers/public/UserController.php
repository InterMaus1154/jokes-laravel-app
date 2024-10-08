<?php

namespace App\Http\Controllers\public;
use App\Models\Joke;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show user's profile
     * public.view.profile
     */
    public function show(User $user)
    {
        $user = $user->loadCount('jokes', 'jokeComments', 'tags', 'jokes');
        $jokes = $user->jokes()->paginate(Joke::$PAGINATION_COUNT);
        return view('public.user-profile', compact('user', 'jokes'));
    }
}
