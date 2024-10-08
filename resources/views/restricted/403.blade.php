{{--view for 403 response--}}
<x-response.layout title="403: Forbidden">
    <h1>403: You don't have permission for this request!</h1>
    @include("restricted.message")
    <div class="action-container">
        <a href="{{route('public.index')}}">Go back to Main Page</a>
    </div>
</x-response.layout>
