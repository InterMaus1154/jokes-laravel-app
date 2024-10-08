{{--joke box component--}}
<div class="joke-box">
    <div class="joke-box-header">
        <div class="joke-box-actions">
            <a href="{{route('public.view.joke', compact('joke'))}}" class="em-button">View Joke</a>
            @can('update', [\App\Models\Joke::class, $joke])
                <a href="{{route('user.joke.edit', compact('joke'))}}" class="em-button">Edit Joke</a>
            @endcan
        </div>
        <span>Joke posted by
            <a href="{{route('public.view.profile', ['user' => $joke->user])}}"
               class="bold italic">{{$joke->user->username}}</a>
            at
            <i class="bold"> {{$joke->formatted_created_at}}</i>
        </span>
        <p class="bold">Comments: {{$joke->joke_comments_count ?? $joke->jokeComments()->count()}}</p>
    </div>
    <details class="joke-question-holder">
        <summary class="bold">
            {{$joke->joke_question}}
        </summary>
        <p>
            {{$joke->joke_answer}}
        </p>
    </details>
    <div class="tags">
        {{--display joke tags--}}
        @each('joke.tag', $joke->jokeTags, 'tag')
    </div>
</div>
