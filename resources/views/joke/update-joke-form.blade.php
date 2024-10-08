{{--update a joke form--}}
<x-general.layout title="LaughLab - Update Joke">
    <section class="form-section page-padding">
        <div class="form-wrapper">
            <h2 class="form-title">Update Joke</h2>
            <x-response.error />
            <x-response.success />
            <form method="POST" action="{{route('user.joke.update', compact('joke'))}}">
                @csrf
                @method('PUT')
                <div class="input-wrapper">
                    <label for="joke_question">Joke Question: </label>
                    <input type="text" id="joke_question" name="joke_question" maxlength="500" required value="{{$joke->joke_question}}">
                </div>
                <div class="input-wrapper">
                    <label for="joke_answer">Joke Answer: </label>
                    <input type="text" id="joke_answer" name="joke_answer" maxlength="500" required value="{{$joke->joke_answer}}">
                </div>
                <div class="input-wrapper">
                    <label for="is_adult">Is the joke 18+?(will be evaluated)</label>
                    <input type="checkbox" id="is_adult" name="is_adult" value="1" checked="{{$joke->is_adult}}"/>
                </div>
                <input type="submit" value="Update Joke" class="submit-button">
            </form>
        </div>
    </section>
</x-general.layout>
