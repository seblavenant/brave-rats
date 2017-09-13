<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use BraveRats\Entities\Character;

class AbstractCharacter
{
    protected
        $crossFightDone;

    public function __construct()
    {
        $this->crossFightDone = false;
    }

    protected function crossedFight(Character $character): ?Character
    {
        $this->crossFightDone = true;

        $winner = $character->fight($this);

        if($winner instanceof Character)
        {
            return $winner;
        }

        if($this->strength() > $character->strength())
        {
            return $this;
        }
        elseif($this->strength() < $character->strength())
        {
            return $character;
        }

        return null;
    }
}