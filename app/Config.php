<?php

namespace App;

final readonly class Config
{
    public static function random(): self
    {
        return new self(
            size: random_int(5, 9),
            seed: random_int(0, 2 ** 32)
        );
    }

    public static function make(string $seed): self
    {
        return new self(
            size: hexdec(substr($seed, 0, 2)),
            seed: hexdec(substr($seed, 2))
        );
    }

    public function __construct(
        public int $size,
        public int $seed
    ) {}

    public function __toString(): string
    {
        return str_pad(dechex($this->size), 2, '0', STR_PAD_LEFT)
        .str_pad(dechex($this->seed), 9, '0', STR_PAD_LEFT);
    }
}
