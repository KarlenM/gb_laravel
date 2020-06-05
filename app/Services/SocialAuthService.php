<?php
namespace App\Services;

use \App\Models\SocialAuth;
use \App\Models\SocialProviders;
use \App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;


class SocialAuthService
{
    public function createOrGetUser(ProviderUser $providerUser, $socialProvider)
    {
        $provider = SocialProviders::whereName($socialProvider)
        ->first()
        ->id;

        $account = SocialAuth::whereProviderId($provider)
        ->whereProviderUserId($providerUser->getId())
        ->first();
//leftJoin('social_providers', 'social_providers.id', '=', 'users_social_accounts.provider_id')

        if ($account)
            return $account->user;
        else
        {

            $account = new SocialAuth([
                'provider_user_id' => $providerUser->getId(),
                'provider_id' => 1
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}