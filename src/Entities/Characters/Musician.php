<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Musician extends AbstractCharacter implements Character
{
    public function strength(): int
    {
        return 0;
    }

    public function label(): string
    {
        return 'Musicien';
    }

    public function fight(Character $character): ?Character
    {
        if($character instanceof Wizard)
        {
            return $character;
        }

        return null;
    }
}
