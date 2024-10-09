<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Show change password view
     */
    public function changePasswordView()
    {
        $user = auth()->user();
        $this->authorize('update', [User::class, $user]);
        return view('form.change-password');
    }

    /**
     * Change password action
     */
    public function updatePassword(UpdateUserPasswordRequest $request)
    {
        $user = auth()->user();
        $this->authorize('update', [User::class, $user]);

        $userActual = User::find($user->user_id);

        $isUpdated = $userActual->update([
            'password' => $request->validated('new_password')
        ]);

        if($isUpdated){
            return redirect()->back()->with('success', 'Password updated successfully!');
        }

        return redirect()->back()->withErrors(['error' => 'Error at updating password']);
    }

}
