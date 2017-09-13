<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class Assassin extends AbstractCharacter implements Character
{
    public function strength(): int
    {
        return 3;
    }

    public function label(): string
    {
        return 'Assasin';
    }

    public function fight(Character $character): ?Character
    {
        if($character instanceof Prince)
        {
            return $character;
        }

        if($this->strength() < $character->strength())
        {
            return $this;
        }
        elseif($this->strength() > $character->strength())
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
