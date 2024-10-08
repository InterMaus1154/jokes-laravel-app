{{--create a new joke form--}}
<x-general.layout title="LaughLab - Create Joke">
    <section class="form-section page-padding">
        <div class="form-wrapper">
            <h2 class="form-title">Create New Joke</h2>
            <x-response.error />
            <x-response.success />
            <form method="POST" action="{{route('user.joke.store')}}">
                @csrf
                @method('POST')
                <div class="input-wrapper">
                    <label for="joke_question">Joke Question: </label>
                    <input type="text" id="joke_question" name="joke_question" maxlength="500" required value="{{old('joke_question', '')}}">
                </div>
                <div class="input-wrapper">
                    <label for="joke_answer">Joke Answer: </label>
                    <input type="text" id="joke_answer" name="joke_answer" maxlength="500" required value="{{old('joke_answer', '')}}">
                </div>
                <div class="input-wrapper">
                    <label for="is_adult">Is the joke 18+?(will be evaluated)</label>
                    <input type="checkbox" id="is_adult" name="is_adult" value="1"/>
                </div>
                {{--available tags--}}
                <div class="tag-wrapper">
                    <label>Tag(category):</label>
                    <div class="tags-holder">
                        @foreach($tags as $tag)
                            <div class="tag-input-holder">
                                <label class="joke-tag" for="{{$tag->tag_name}}" style="--tag-bg: {{$tag->tag_color}}" >{{$tag->tag_name}}</label>
                                <input type="checkbox" name="joke_tags[]" id="{{$tag->tag_name}}" value="{{$tag->tag_id}}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <input type="submit" value="Create Joke" class="submit-button">
            </form>
        </div>
    </section>
</x-general.layout>
