<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;

abstract class OauthController
{
    protected function provider(string $provider): AbstractProvider
    {
        $driver = Socialite::driver($provider);

        assert($driver instanceof AbstractProvider);

        $driver->redirectUrl(URL::route('oauth.callback', [
            'provider' => $provider,
        ]));

        return $driver;
    }
}
