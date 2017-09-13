<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Prince extends AbstractCharacter implements Character
{
    public function strength(): int
    {
        return 7;
    }

    public function label(): string
    {
        return 'Prince';
    }

    public function fight(Character $character): ?Character
    {
        if($character instanceof Princess)
        {
            return $character;
        }

        if(! $this->crossFightDone)
        {
            return $this->crossedFight($character);
        }

        return null;
    }
}
