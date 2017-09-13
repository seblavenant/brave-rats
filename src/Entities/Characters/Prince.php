<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Prince implements Character
{
    public function strength(): int
    {
        return 7;
    }

    public function label(): string
    {
        return 'Prince';
    }
}
