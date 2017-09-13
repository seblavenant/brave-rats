<?php

declare(strict_types = 1);

namespace BraveRats\Entities;

use BraveRats\Collections\Characters;

class Player
{
    private
        $currentCharacter,
        $availableCharacters;

    public function __construct()
    {
        $this->availableCharacters = new Characters();
    }

    public function choose(string $characterLabel): void
    {
        $character = $this->availableCharacters->getCharacterFromLabel($characterLabel);

        $this->currentCharacter = $character;

        $this->availableCharacters->remove($character);
    }

    public function getCurrentCharacter(): Character
    {
        return $this->currentCharacter;
    }

    public function getAvailableCharacters(): Characters
    {
        return $this->availableCharacters;
    }
}

