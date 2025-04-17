<?php

namespace App\Http\Controllers\Auth;

use Symfony\Component\HttpFoundation\RedirectResponse;

class RedirectOauthController extends OauthController
{
    public function __invoke(string $provider): RedirectResponse
    {
        return $this->provider($provider)
            ->redirect();
    }
}
