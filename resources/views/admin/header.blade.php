{{--admin header (sub header)--}}
<header class="full-width sub-header">
    <div class="inner-wrapper page-padding">
        <p>{{auth()->user()->username}}</p>
        <nav>
            <ul>
                <li>
                    <a href="{{route('admin.view.users')}}">Manage Users</a>
                </li>
                <li>
                    <a href="#">Manage Jokes</a>
                </li>
                <li>
                    <a href="#">Manage Tags</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
