<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show change password view
     */
    public function changePasswordView()
    {
        return view('form.change-password');
    }

    /**
     * Change password action
     */
    public function updatePassword(Request $request)
    {

    }

}
