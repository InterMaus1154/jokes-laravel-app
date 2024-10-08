<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * List all registered users
     */
    public function index()
    {
        $this->authorize('viewAll', User::class);

        //get users
        $users = User::paginate(10);
        $usersCount = User::count();
        return view('admin.users', compact('users', 'usersCount'));
    }

    /**
     * Verify an unverified user
     */
    public function verify(User $user)
    {

        $this->authorize('verifyUser', User::class);

        $isUpdated = $user->update([
            'is_verified' => true
        ]);

        if($isUpdated){
            return redirect()->back()->with('success', 'User successfully verified!');
        }

        return redirect()->back()->withErrors(['error' => 'User couldn\'t be verified!']);
    }

    /**
     * Restrict a user
     */
    public function restrictUser(User $user)
    {
        $this->authorize('restrictUser', User::class);

        $isUpdated = $user->update([
           'role' => UserRole::RESTRICTED->value
        ]);

        if($isUpdated){
            return redirect()->back()->with('success', 'User successfully restricted!');
        }

        return redirect()->back()->withErrors(['error' => 'Action cannot be performed!']);
    }

    /**
     * Make a user unrestricted
     */
    public function unrestrictUser(User $user)
    {
        $this->authorize('unrestrictUser', User::class);

        $isUpdated = $user->update([
            'role' => UserRole::RESTRICTED->value
        ]);

        if($isUpdated){
            return redirect()->back()->with('success', 'User successfully restricted!');
        }

        return redirect()->back()->withErrors(['error' => 'Action cannot be performed!']);
    }
}
