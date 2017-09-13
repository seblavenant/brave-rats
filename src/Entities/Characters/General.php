<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class General implements Character
{
    public function strength(): int
    {
        return 6;
    }

    public function label(): string
    {
        return 'General';
    }
}
