<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Spy extends AbstractCharacter implements Character
{
    public function strength(): int
    {
        return 2 + $this->strenghtIncreaser;
    }

    public function label(): string
    {
        return 'Espion';
    }
}
