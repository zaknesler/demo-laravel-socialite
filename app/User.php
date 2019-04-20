<?php

namespace App;

use App\UserSocialAccount;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'name',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get signed url to authenticate user.
     *
     * @return string
     */
    public function getPasswordlessAuthenticationUrl()
    {
        return URL::temporarySignedRoute('auth.login.passwordless.authenticate', now()->addMInutes(60), $this);
    }

    /**
     * Fetch the user's avatar.
     *
     * @param  integer $size
     * @return string
     */
    public function getAvatar($size = 100)
    {
        if (is_null($this->avatar)) {
            return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=' . $size;
        }

        return $this->avatar;
    }

    /**
     * Fetch the user's display name.
     *
     * @return string
     */
    public function getDisplayName()
    {
        if (is_null($this->name)) {
            return $this->username;
        }

        return $this->name;
    }

    /**
     * Determine if the user has a social account attached with a specified provider.
     *
     * @param  string $provider
     * @return boolean
     */
    public function hasSocialAccountFor($provider)
    {
        return (boolean) $this->socialAccounts()->where('provider', $provider)->count();
    }

    /**
     * A user can have many social accounts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialAccounts()
    {
        return $this->hasMany(UserSocialAccount::class);
    }
}
