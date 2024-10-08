{{--view for 401 response--}}
<x-response.layout title="401: Unauthorized">
    <h1>401: You need to be logged in to access this area!</h1>
    @include("restricted.message")
    <div class="action-container">
        <a href="{{route('public.index')}}">Go back to Main Page</a>
    </div>
</x-response.layout>
