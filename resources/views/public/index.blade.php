{{-----------}}
{{--public facing index page--}}
{{--this page is the page, which any visitor sees--}}
{{--login is not required--}}
{{-----------}}
<x-general.layout title="LaughLab - Home">
    <x-response.error/>
    <x-response.success/>
    <section class="page-section page-padding public-section">
        <div class="section-header">
            <p class="bold">Total Jokes: {{$jokes->count()}}</p>
            {{$jokes->links('vendor.pagination.default')}}
        </div>
        <div class="section-content">
            {{--filter box--}}
            <aside class="filter-box">
                <h3>Filter Jokes</h3>
                <div>
                    <form action="{{route('public.index')}}" method="GET">
                        <div class="tag-wrapper">
                            <label>Tag(category):</label>
                            <div class="tags-holder">
                                @foreach($tags as $tag)
                                    <div class="tag-input-holder">
                                        <label class="joke-tag" for="{{$tag->tag_name}}"
                                               style="--tag-bg: {{$tag->tag_color}}">{{$tag->tag_name}}</label>
                                        <input type="checkbox" name="joke_tags[]" id="{{$tag->tag_name}}"
                                               value="{{$tag->tag_id}}"
                                            {{in_array($tag->tag_id, request()->get('joke_tags', [])) ? "checked" : ""}}
                                            {{request()->get('tag', '') == $tag->tag_id ? "checked" : ""}}
                                        >
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <label for="keywords">Keywords:(separate by /)</label>
                            <input type="text" name="keywords" id="keywords">
                        </div>
                        <input type="submit" value="Filter" class="em-button">
                    </form>
                </div>
            </aside>
            <div class="jokes-section">
                {{--display jokes--}}
                @each('joke.joke-box', $jokes, 'joke', 'joke.joke-empty')
            </div>
        </div>
    </section>
</x-general.layout>
