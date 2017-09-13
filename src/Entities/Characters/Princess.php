<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Princess implements Character
{
    public function strength(): int
    {
        return 1;
    }

    public function label(): string
    {
        return 'Princesse';
    }

    public function getNumber(): int
    {
        return 1;
    }
}
