{{--joke tag --}}
<a href="{{route('public.index', ['tag' => $tag->tag_id])}}" class="joke-tag" style="--tag-bg: {{$tag->tag->tag_color}}">{{$tag->tag->tag_name}}</a>
