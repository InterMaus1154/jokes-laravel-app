<x-general.layout title="LaughLab - Joke Detail">
    <section class="joke-page page-padding page-section">
        @include('joke.joke-box', compact('joke'))
        <h2>Comments</h2>
        <div class="comments-section">
            @each('comment.comment-box', $joke->jokeComments, 'comment')
        </div>
    </section>
</x-general.layout>
