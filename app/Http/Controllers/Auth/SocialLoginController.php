<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Notifications\GitHubAccountLinked;

class SocialLoginController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('social')->only('redirectToProvider', 'handleProviderCallback');

        $this->middleware('auth')->only('logout');
        $this->middleware('guest')->except('logout');
    }

    /**
     * Display the login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = $this->fetchExistingUser($providerUser, $provider);

        if (!$user) {
            $user = User::create([
                'name' => $providerUser->getName(),
                'username' => $providerUser->getNickname(),
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar(),
            ]);
        }

        if (!$user->hasSocialAccountFor($provider)) {
            $user->socialAccounts()->create([
                'account_id' => $providerUser->getId(),
                'provider' => $provider,
            ]);
        }

        auth()->login($user, true);

        return redirect()->intended(route('home'));
    }

    /**
     * Fetch existing user.
     *
     * @param  \Laravel\Socialite\Two\User $providerUser
     * @return App\User
     */
    protected function fetchExistingUser($providerUser, $provider)
    {
        return User::where('email', $providerUser->getEmail())->orWhereHas('socialAccounts', function ($q) use ($providerUser, $provider) {
            $q->where('account_id', $providerUser->getId())->where('provider', $provider);
        })->first();
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
