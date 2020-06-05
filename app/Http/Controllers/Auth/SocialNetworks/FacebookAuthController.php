<?php

namespace App\Http\Controllers\Auth\SocialNetworks;

use App\Http\Controllers\Controller;
use App\Services\SocialAuthService;
use Socialite;

class FacebookAuthController extends Controller
{

    protected $socialProvider = 'facebook';

    public function redirect()
    {
        return Socialite::driver($this->socialProvider)
        ->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handle(SocialAuthService $service)
    {
        $user = $service->createOrGetUser(
            Socialite::driver(
                $this->socialProvider)->user(),
                $this->socialProvider
            );

        auth()->login($user);

        return redirect()->route('admin.main');

        // $user = \Socialite::driver('facebook')
        // ->user();

        // $user->expiresIn;
        // $user->token;
        // $user->refreshToken;
        // $user->getId();
        // $user->getNickname();
        // $user->getName();
        // $user->getEmail();
        // $user->getAvatar();
    }
}
