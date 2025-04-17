<?php

namespace App\Providers;

use App\Events\PuzzleSolved;
use App\Listeners\UnlockPuzzleSolvedAchievements;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Discord\Provider as DiscordProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Model::unguard();

        Relation::enforceMorphMap([
            User::class,
        ]);

        Event::listen(function (SocialiteWasCalled $event): void {
            $event->extendSocialite('discord', DiscordProvider::class);
        });

        Event::listen(PuzzleSolved::class, UnlockPuzzleSolvedAchievements::class);
    }
}
