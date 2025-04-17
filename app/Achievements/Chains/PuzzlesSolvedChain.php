<?php

declare(strict_types=1);

namespace App\Achievements\Chains;

use App\Achievements\PuzzlesSolved1;
use App\Achievements\PuzzlesSolved10;
use App\Achievements\PuzzlesSolved100;
use App\Achievements\PuzzlesSolved25;
use App\Achievements\PuzzlesSolved50;
use Assada\Achievements\AchievementChain;

class PuzzlesSolvedChain extends AchievementChain
{
    public function chain(): array
    {
        return [
            new PuzzlesSolved1,
            new PuzzlesSolved10,
            new PuzzlesSolved25,
            new PuzzlesSolved50,
            new PuzzlesSolved100,
        ];
    }
}
