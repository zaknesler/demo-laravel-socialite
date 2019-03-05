<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Zttp\Zttp;
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
        $this->middleware('social')->only('redirectToProvider', 'handleProviderCallback', 'removeProvider');

        $this->middleware('auth')->only('logout');
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
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param string $provider
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
     * Remove a provider from the user's account and redirect to the provider's manage url.
     *
     * @param  string $provider
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeProvider($provider)
    {
        request()->user()->socialAccounts()
            ->whereProvider($provider)
            ->delete();

        return response()->json([
            'redirect' => config("auth.social.providers.$provider.manage_url"),
        ]);
    }

    protected function revokeGitHub()
    {
        // Zttp::delete("https://github.com/api/v3/applications");
    }

    /**
     * Fetch existing user.
     *
     * @param  \Laravel\Socialite\Two\User $providerUser
     * @param  string $provider
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'redirect' => route('index'),
        ]);
    }
}
