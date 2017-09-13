<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Spy implements Character
{
    public function strength(): int
    {
        return 2;
    }

    public function label(): string
    {
        return 'Espion';
    }
}
