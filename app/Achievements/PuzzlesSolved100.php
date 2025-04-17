<?php

declare(strict_types=1);

namespace App\Achievements;

use Assada\Achievements\Achievement;

class PuzzlesSolved100 extends Achievement
{
    public $points = 100;

    public $name = 'Puzzles Solved (100)';

    public $description = '';
}
