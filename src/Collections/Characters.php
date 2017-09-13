<?php

declare(strict_types = 1);

namespace BraveRats\Collections;

use BraveRats\Entities\Character;
use BraveRats\Entities\Characters\Musician;
use BraveRats\Exceptions\Characters\CharacterNotFound;

class Characters implements \IteratorAggregate
{
    private
        $characters;

    public function __construct()
    {
        $this->characters = [
            new Musician(),
        ];
    }

    public function getCharacterFromLabel(string $character): Character
    {
        foreach($this->characters as $characterAvailable)
        {
            if($characterAvailable->label() === $character)
            {
                return $characterAvailable;
            }
        }

        throw new CharacterNotFound();
    }

    public function remove(Character $character): void
    {
        foreach($this->characters as $index => $characterAvailable)
        {
            if($characterAvailable instanceof $character)
            {
                unset($this->characters[$index]);
            }
        }
    }

    public function getIterator (): \ArrayIterator
    {
        return new \ArrayIterator($this->characters);
    }

    public function toArray(): array
    {
        $characters = [];
        foreach($this->characters as $character)
        {
            $characters[] = $character->label();
        }

        return $characters;
    }

    static public function retrieveFromLabel(string $characterId)
    {
        foreach($this->characters as $character)
        {
            if($characterId === $character->label())
            {
                return $character;
            }
        }

        throw new CharacterNotFound();
    }
}
