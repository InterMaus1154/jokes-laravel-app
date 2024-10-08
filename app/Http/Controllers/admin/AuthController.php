<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Enums\LoginFormType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {


    }

    /***
     * Show login form page
     */
    public function showLogin()
    {
        return view('form.login', ['formType' => LoginFormType::ADMIN->value]);
    }
}
