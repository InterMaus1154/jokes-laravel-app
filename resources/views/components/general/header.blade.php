{{--header component--}}
<header class="full-width main-header">
    <div class="inner-wrapper page-padding">
        <h1 title="Home page">
            <a href="{{route('public.index')}}">LaughLab</a>
        </h1>
        @restricted
            <h2 class="form-response error-response">Your account is restricted!</h2>
        @endrestricted
        <nav>
            <ul>
                <li>
                    <a href="{{route('public.index')}}">Home</a>
                </li>
                @auth
                    <li>
                        <a href="{{route('public.view.profile', ['user' => auth()->user()])}}">Profile</a>
                    </li>
                    <li>
                        <a href="{{route('user.joke.create')}}">Create Joke</a>
                    </li>
                    <li>
                        <a href="{{route('user.tag.create')}}">Create Tag</a>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{route('user.view.login')}}">Login</a>
                    </li>
                    <li>
                        <a href="{{route('user.view.register')}}">Register</a>
                    </li>
                @endguest
                @auth
                    <li>
                        <form class="secret-form" method="POST" action="{{route('user.auth.logout')}}">
                            @csrf
                            <input type="submit" value="Logout">
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
