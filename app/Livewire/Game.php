<?php

namespace App\Livewire;

use App\Config;
use App\Sukuro;
use Illuminate\Contracts\View\View as ViewContract;
use Livewire\Component;

class Game extends Component
{
    public string $seed;

    public array $selected = [];

    public array $hidden = [];

    public bool $solved = false;

    public function mount(string $seed): void
    {
        $this->seed = $seed;
    }

    public function toggle(int $row, int $col): void
    {
        if ($this->solved) {
            return;
        }

        $cell = "{$row}.{$col}";

        if (in_array($cell, $this->hidden, true)) {
            $this->unhide($row, $col);

            return;
        }

        if (in_array($cell, $this->selected, true)) {
            $this->hide($row, $col);

            return;
        }

        $this->select($row, $col);

        $this->solved = $this->isSolved();
    }

    public function hide(int $row, int $col): void
    {
        if ($this->solved) {
            return;
        }

        $this->unselect($row, $col);

        $this->hidden = collect($this->hidden)
            ->push("{$row}.{$col}")
            ->unique()
            ->values()
            ->all();
    }

    public function unhide(int $row, int $col): void
    {
        if ($this->solved) {
            return;
        }

        $this->hidden = collect($this->hidden)
            ->reject("{$row}.{$col}")
            ->unique()
            ->values()
            ->all();
    }

    public function select(int $row, int $col): void
    {
        if ($this->solved) {
            return;
        }

        $this->unhide($row, $col);

        $this->selected = collect($this->selected)
            ->push("{$row}.{$col}")
            ->unique()
            ->values()
            ->all();
    }

    public function unselect(int $row, int $col): void
    {
        if ($this->solved) {
            return;
        }

        $this->selected = collect($this->selected)
            ->reject("{$row}.{$col}")
            ->unique()
            ->values()
            ->all();
    }

    public function render(): ViewContract
    {
        return view('livewire.game', [
            'grid' => $this->sukuro(),
        ]);
    }

    private function sukuro(): Sukuro
    {
        $config = $this->config();

        return new Sukuro(
            size: $config->size,
            seed: $config->seed,
            selected: $this->selected,
            hidden: $this->hidden,
        );
    }

    private function config(): Config
    {
        return Config::make($this->seed);
    }

    private function isSolved(): bool
    {
        $grid = $this->sukuro();

        $solved = true;

        for ($r = 0; $r < $this->config()->size; $r++) {
            if (! $grid->isSolved(row: $r)) {
                $solved = false;
            }

            for ($c = 0; $c < $this->config()->size; $c++) {
                if (! $grid->isSolved(col: $c)) {
                    $solved = false;
                }
            }
        }

        return $solved;
    }
}
