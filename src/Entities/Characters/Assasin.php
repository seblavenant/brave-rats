<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Assasin implements Character
{
    public function strength(): int
    {
        return 3;
    }

    public function label(): string
    {
        return 'Assasin';
    }
}
