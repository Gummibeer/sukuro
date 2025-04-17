<?php

declare(strict_types=1);

namespace App\Achievements;

use Assada\Achievements\Achievement;

class PuzzlesSolved1000 extends Achievement
{
    public $points = 1000;

    public $name = 'Puzzles Solved (1000)';

    public $description = '';
}
