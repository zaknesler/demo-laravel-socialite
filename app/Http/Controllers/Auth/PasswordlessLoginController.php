<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\PasswordlessLogin;
use App\User;
use Illuminate\Http\Request;

class PasswordlessLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('signed')->only('authenticate');
    }

    public function index()
    {
        return view('auth.passwordless');
    }

    public function sendLoginEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::whereEmail($request->email)->first();

        $user->notify(new PasswordlessLogin($user));

        return redirect()->back();
    }

    public function authenticate(User $user)
    {
        auth()->login($user, true);

        return redirect()->route('home');
    }
}
