<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CallbackOauthController extends OauthController
{
    public function __invoke(string $provider): RedirectResponse
    {
        $socialite = $this->provider($provider)->user();

        $user = User::query()->firstOrCreate([
            "{$provider}_id" => $socialite->getId(),
        ], [
            'nickname' => $socialite->getNickname(),
            'email' => $socialite->getEmail(),
        ]);

        if ($user->wasRecentlyCreated) {
            Event::dispatch(new Registered($user));
        }

        Auth::login($user);

        return Redirect::route('home');
    }
}
