<x-general.layout title="LaughLab - Joke Detail">
    <section class="joke-page page-padding page-section">
        @include('joke.joke-box', compact('joke'))
        {{--add new comment section--}}
        <div class="add-comment-section">
            <h2>Add a new comment</h2>
            <x-response.success />
            <x-response.error />
            <form method="POST" >
                @csrf
                @method('POST')
                <div class="input-wrapper">
                    <label for="comment_content">Comment content:</label>
                    <textarea id="comment_content" name="comment_content" required rows="3"></textarea>
                </div>
                <input type="submit" value="Post Comment" class="submit-button">
            </form>
        </div>
        <h2>Comments</h2>
        <div class="comments-section">
            @each('comment.comment-box', $joke->jokeComments, 'comment', 'comment.comment-empty')
        </div>
    </section>
</x-general.layout>
