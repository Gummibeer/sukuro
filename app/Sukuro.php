<?php

namespace App;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

final readonly class Sukuro implements Arrayable
{
    private Collection $grid;

    private Collection $rows;

    private Collection $cols;

    private Collection $selected;

    private Collection $hidden;

    public function __construct(
        int $size,
        int $seed,
        array $selected,
        array $hidden,
    ) {
        mt_srand($seed);

        $this->grid = LazyCollection::times($size)
            ->map(fn () => LazyCollection::times($size)->collect()->map(fn () => mt_rand(1, 9)))
            ->collect();

        $solutions = $this->grid
            ->map(function (mixed $v, int $r) use ($size): Collection {
                return LazyCollection::times(mt_rand(1, 5))
                    ->map(fn () => mt_rand(1, $size) - 1)
                    ->map(fn (int $c) => "{$r}.{$c}")
                    ->collect();
            })
            ->flatten()
            ->unique()
            ->values();

        do {
            $cols = $solutions
                ->map(fn (string $cell) => (int) explode('.', $cell)[1])
                ->unique()
                ->sort()
                ->values();

            $diff = Collection::range(0, $size - 1)
                ->diff($cols)
                ->each(fn (int $c) => $solutions->push(mt_rand(1, $size - 1).'.'.$c));
        } while ($diff->isNotEmpty());

        $solutions = $solutions
            ->unique()
            ->sort()
            ->values();

        $this->rows = $solutions
            ->groupBy(fn (string $cell) => (int) explode('.', $cell)[0])
            ->sortKeys()
            ->map(fn (Collection $cells) => $cells->map(fn (string $cell) => data_get($this->grid, $cell))->sum());

        $this->cols = $solutions
            ->groupBy(fn (string $cell) => (int) explode('.', $cell)[1])
            ->sortKeys()
            ->map(fn (Collection $cells) => $cells->map(fn (string $cell) => data_get($this->grid, $cell))->sum());

        mt_srand();

        $this->selected = collect($selected)->unique()->values();
        $this->hidden = collect($hidden)->unique()->values();
    }

    public function row(int $index): Collection
    {
        return $this->grid->get($index);
    }

    public function column(int $index): Collection
    {
        return $this->grid->pluck($index);
    }

    public function isSolved(?int $row = null, ?int $col = null): bool
    {
        if ($row !== null) {
            return $this->selected
                ->filter(fn (string $cell) => str_starts_with($cell, "{$row}."))
                ->map(fn (string $cell) => data_get($this->grid, $cell))
                ->sum() === $this->rows->get($row);
        }

        if ($col !== null) {
            return $this->selected
                ->filter(fn (string $cell) => str_ends_with($cell, ".{$col}"))
                ->map(fn (string $cell) => data_get($this->grid, $cell))
                ->sum() === $this->cols->get($col);
        }

        return false;
    }

    public function isSelected(int $row, int $col): bool
    {
        return $this->selected->contains("{$row}.{$col}");
    }

    public function isHidden(int $row, int $col): bool
    {
        return $this->hidden->contains("{$row}.{$col}");
    }

    public function toArray(): array
    {
        return $this->grid
            ->map(fn (Collection $row, int $i) => collect($row)->put(-1, $this->rows->get($i))->sortKeys())
            ->put(-1, collect($this->cols)->put(-1, null)->sortKeys())
            ->sortKeys()
            ->toArray();
    }
}
