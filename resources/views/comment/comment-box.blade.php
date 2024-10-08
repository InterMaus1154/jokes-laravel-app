{{--comment box component--}}
<div class="comment-box">
    <div class="comment-box-header">
        <p>Commented by <a href="{{route('public.view.profile', ['user' => $comment->user])}}" class="bold italic">{{$comment->user->username}}</a> at <span class="bold italic">{{$comment->formatted_created_at}}</span> </p>
    </div>
    <p class="comment-content">
        {{$comment->comment_content}}
    </p>
</div>
