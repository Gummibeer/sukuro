<?php

declare(strict_types=1);

namespace App\Achievements;

use Assada\Achievements\Achievement;

class PuzzlesSolved1 extends Achievement
{
    public $points = 1;

    public $name = 'First Puzzle Solved';

    public $description = '';
}
