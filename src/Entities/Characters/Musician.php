<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Musician implements Character
{
    public function strength(): int
    {
        return 0;
    }

    public function label(): string
    {
        return 'Musicien';
    }
}
