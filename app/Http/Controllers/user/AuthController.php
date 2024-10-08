<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\Enums\LoginFormType;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show login view for user.
     * user.view.login
     */
    public function showLogin()
    {
        return view('form.login', ['formType' => LoginFormType::USER->value]);
    }

    /**
     * Login method
     * user.auth.login
     */
    public function login(LoginUserRequest $request)
    {
        /*find user based on email or username*/
        $user = User::whereUsername($request->validated('identifier'))->orWhere('email', $request->validated('identifier'))->first();

        /*check if user exists and password match*/
        if(!$user || !Hash::check($request->validated('password'), $user->password)){
            return redirect()->route('user.view.login')->withInput()->withErrors(['error' => 'Invalid credentials!']);
        }

        /*check if user is verified*/
        if(!$user->is_verified){
            session()->flash('response_message', 'Your account is not verified yet!');
            return redirect()->route('auth.403');
        }

        /*login user*/
        auth()->login($user);
        /*redirect to main*/
        return redirect()->route('public.index');
    }

    /**
     * Show register form
     * user.view.register
     */
    public function showRegister()
    {
        return view('form.user.register');
    }

    /**
     * Register new user
     * user.auth.register
     */
    public function register(StoreUserRequest $request)
    {

        /*Create new user from validated data*/
        $user = User::create([
            'username' => $request->validated('username'),
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
            'date_of_birth' => $request->validated('date_of_birth')
        ]);

        /*if user was successfully created*/
        if ($user) {
            return redirect()->route('user.view.register')->with(['success' => 'Account created successfully. We will notify when your account is verified!']);
        }

        return redirect()->route('user.view.register')->withInput()->withErrors(['error' => 'Error at registering. Try again later']);
    }

    /**
     * Logout any user.
     * user.auth.logout
     */
    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect()->route('public.index');
    }

}
