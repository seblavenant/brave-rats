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
        $name,
        $strengthIncreaseNumber;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->points = 0;
        $this->availableCharacters = new Characters();
        $this->strengthIncreaseNumber = 0;
    }

    public function increaseCharacterStrength(int $strength): void
    {
        $this->strengthIncreaseNumber = $strength;
    }

    public function choose(string $characterLabel): void
    {
        $character = $this->availableCharacters->getCharacterFromLabel($characterLabel);
        $character->increaseStrength($this->strengthIncreaseNumber);
        $this->strengthIncreaseNumber = 0;

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
        return $this->points >= 4;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScore(): int
    {
        return $this->points;
    }
}

