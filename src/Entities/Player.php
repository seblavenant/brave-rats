<?php

declare(strict_types = 1);

namespace BraveRats\Entities;

use BraveRats\Collections\Characters;

class Player
{
    private
        $points,
        $currentCharacter,
        $availableCharacters,
        $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->points = 0;
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

    public function win(Round $round): self
    {
        $this->points += $round->getPoint();

        return $this;
    }

    public function hasWinGame()
    {
        return $this->points > 1;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

