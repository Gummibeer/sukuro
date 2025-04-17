<?php

declare(strict_types=1);

namespace App\Achievements;

use Assada\Achievements\Achievement;

class PuzzlesSolved50 extends Achievement
{
    public $points = 50;

    public $name = 'Puzzles Solved (50)';

    public $description = '';
}
