<?php

declare(strict_types = 1);

namespace BraveRats\Entities;

interface Character
{
    public function strength(): int;

    public function label(): string;
}

