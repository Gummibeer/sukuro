<?php

namespace App\Listeners;

use App\Achievements\Chains\PuzzlesSolvedChain;
use App\Events\PuzzleSolved;

class UnlockPuzzleSolvedAchievements
{
    public function handle(PuzzleSolved $event): void
    {
        if (auth()->guest()) {
            return;
        }

        $user = auth()->user();

        $user->addProgress(new PuzzlesSolvedChain);
    }
}
