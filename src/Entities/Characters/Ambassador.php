<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Ambassador implements Character
{
    public function strength(): int
    {
        return 4;
    }

    public function label(): string
    {
        return 'Ambassadeur';
    }

    public function fight(Character $character): ?Character
    {
        return null;
    }
}
