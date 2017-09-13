<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Musician implements Character
{
    public function label(): string
    {
        return 'Musician';
    }
}
