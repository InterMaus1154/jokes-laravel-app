{{--create new tag form--}}
<x-general.layout title="LaughLab - Create Tag">
    <section class="form-section page-padding">
        <div class="form-wrapper">
            <h2 class="form-title">Create New Tag</h2>
            <x-response.error />
            <x-response.success />
            <form method="POST" action="{{route('user.tag.store')}}">
                @csrf
                @method('POST')
                <div class="input-wrapper">
                    <label for="tag_name">Tag Name: </label>
                    <input type="text" id="tag_name" name="tag_name" maxlength="20" required value="{{old('tag_name', '')}}">
                </div>
                <div class="input-wrapper">
                    <label for="tag_color">Tag Color:</label>
                    <input type="color" id="tag_color" name="tag_color" required>
                </div>
                <input type="submit" value="Create Tag" class="submit-button">
            </form>
            <div class="tag-preview">
                <p class="bold">Tag Preview: </p>
                <span class="joke-tag" style="--tag-bg: #27272a">Test</span>
            </div>
        </div>
    </section>
    <script src="{{url("js/tag_preview.js")}}"></script>
</x-general.layout>
