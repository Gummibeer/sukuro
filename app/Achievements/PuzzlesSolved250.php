<?php

declare(strict_types=1);

namespace App\Achievements;

use Assada\Achievements\Achievement;

class PuzzlesSolved250 extends Achievement
{
    public $points = 250;

    public $name = 'Puzzles Solved (250)';

    public $description = '';
}
