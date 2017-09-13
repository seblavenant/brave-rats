<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Princess extends AbstractCharacter implements Character
{
    public function strength(): int
    {
        return 1;
    }

    public function label(): string
    {
        return 'Princesse';
    }

    public function fight(Character $character): ?Character
    {
        if($character instanceof Prince)
        {
            return $this;
        }

        if(! $this->crossFightDone)
        {
            return $this->crossedFight($character);
        }

        return null;
    }
}
