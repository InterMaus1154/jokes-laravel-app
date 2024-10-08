{{-----------}}
{{--public facing index page--}}
{{--this page is the page, which any visitor sees--}}
{{--login is not required--}}
{{-----------}}
<x-general.layout title="LaughLab - Home">
    <x-response.error />
    <x-response.success />
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
                        <input type="submit" value="Filter" class="em-button"
                        >
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
