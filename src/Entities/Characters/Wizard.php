<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Wizard implements Character
{
    public function strength(): int
    {
        return 5;
    }

    public function label(): string
    {
        return 'Magicien';
    }
}
