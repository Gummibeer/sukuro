<?php

declare(strict_types=1);

namespace App\Achievements;

use Assada\Achievements\Achievement;

class PuzzlesSolved500 extends Achievement
{
    public $points = 500;

    public $name = 'Puzzles Solved (500)';

    public $description = '';
}
