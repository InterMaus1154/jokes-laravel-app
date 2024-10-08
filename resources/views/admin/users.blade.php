{{--index page for managing users--}}
<x-general.layout title="LaughLab - Manage Users">
    <section class="users-list page-padding page-section">
        <div class="page-section-header">
            <h2>Users</h2>
            <p class="bold">Total users: {{$usersCount}}</p>
            {{$users->links('vendor.pagination.default')}}
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Restricted</th>
                    <th>Verified</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->user_id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>
                            @if($user->is_restricted)
                                <span class="form-response error-response">Restricted</span>
                            @else
                                <span class="form-response success-response">Unrestricted</span>
                            @endif
                        </td>
                        <td>
                            @if($user->is_verified)
                                <span class="form-response success-response">Verified</span>
                            @else
                                <span class="form-response error-response">Unverified</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('public.view.profile', compact('user'))}}">View Profile</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-general.layout>
