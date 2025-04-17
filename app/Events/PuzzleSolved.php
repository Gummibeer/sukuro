<?php

namespace App\Events;

use App\Sukuro;
use Illuminate\Foundation\Events\Dispatchable;

class PuzzleSolved
{
    use Dispatchable;

    public function __construct(public Sukuro $sukuro) {}
}
