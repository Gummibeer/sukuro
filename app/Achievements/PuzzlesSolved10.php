<?php

declare(strict_types=1);

namespace App\Achievements;

use Assada\Achievements\Achievement;

class PuzzlesSolved10 extends Achievement
{
    public $points = 10;

    public $name = 'Puzzles Solved (10)';

    public $description = '';
}
