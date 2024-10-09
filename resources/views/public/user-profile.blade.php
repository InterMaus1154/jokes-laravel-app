{{--profile details about an user--}}
@php
    /**
     * @var $user
     */
        use Carbon\Carbon;

        //check if the user is viewing their own profile
        $isUserViewingOwn = auth()->check() && auth()->user()->user_id === $user->user_id;
@endphp
<x-general.layout title="LaughLab - {{$user->username}}'s profile">
    <section class="user-profile-section page-section page-padding">
        @if(auth()->check() && auth()->user()->user_id === $user->user_id)
            <h2>Details about your profile</h2>
        @else
            <h2>Details about
                <em>{{$user->username}}'s profile</em>
            </h2>
        @endif
        <x-response.success/>
        <x-response.error/>
        <div class="profile-details">
            @if($isUserViewingOwn)
                <div class="profile-detail">
                    <p class="profile-detail-title">Username:</p>
                    <div class="profile-detail-content">
                        {{$user->username}}
                    </div>
                </div>
                <div class="profile-detail">
                    <p class="profile-detail-title">Email:</p>
                    <div class="profile-detail-content">{{$user->email}}</div>
                </div>
                <div class="profile-detail">
                    <p class="profile-detail-title">Password:</p>
                    <a class="profile-detail-content" href="{{route('user.password.edit')}}">Change Password</a>
                </div>
            @endif
            <div class="profile-detail">
                <p class="bold profile-detail-title">Date of registration:</p>
                <div class="profile-detail-content">{{Carbon::parse($user->created_at)->isoFormat('YYYY-MM-DD')}}</div>
            </div>
            <div class="profile-detail">
                <p class="bold profile-detail-title">Verification status:</p>
                <div class="profile-detail-content">
                    @if($user->is_verified)
                        <span class="form-response success-response">Verified</span>
                    @else
                        <span class="form-response error-response">Unverified</span>
                        @admin
                        <form class="secret-form" method="POST"
                              action="{{route('admin.user.verify', compact('user'))}}">
                            @csrf
                            @method('patch')
                            <input type="submit" class="bold" value="Verify user"/>
                        </form>
                        @endadmin
                    @endif
                </div>
            </div>
            <div class="profile-detail">
                <p class="bold profile-detail-title">Restriction status:</p>
                <div class="profile-detail-content">
                    @if($user->is_restricted)
                        <span class="form-response error-response">Restricted</span>
                    @else
                        <span class="form-response success-response">Unrestricted</span>
                        @admin
                        <form method="POST" action="{{route('admin.user.restrict', compact('user'))}}"
                              class="secret-form">
                            @csrf
                            @method('PATCH')
                            <input type="submit" value="Restrict user" class="bold">
                        </form>
                        @endadmin
                    @endif
                </div>
            </div>
            <div class="profile-detail">
                <p class="profile-detail-title">Number of jokes posted:</p>
                <div class="profile-detail-content">{{$user->jokes_count}}</div>
            </div>
            <div class="profile-detail">
                <p class="profile-detail-title">Number of comments made:</p>
                <div class="profile-detail-content">{{$user->joke_comments_count}}</div>
            </div>
            <div class="profile-detail">
                <p class="profile-detail-title">Tag contribution:</p>
                <div class="profile-detail-content">{{$user->tags_count}}</div>
            </div>
        </div>
        <h2>
            @if($isUserViewingOwn)
                Your jokes
            @else
                Jokes posted by {{$user->username}}
            @endif
        </h2>
        {{$jokes->links('vendor.pagination.default')}}
        <div class="jokes-section">
            @each('joke.joke-box', $jokes, 'joke', 'joke.joke-empty')
        </div>
    </section>
</x-general.layout>
