<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class NullCharacter implements Character
{
    public function label(): string
    {
        return 'poney';
    }
}
