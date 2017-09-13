<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Assasin extends AbstractCharacter implements Character
{
    public function strength(): int
    {
        return 3 + $this->strenghtIncreaser;
    }

    public function label(): string
    {
        return 'Assasin';
    }
}
