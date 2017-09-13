<?php

declare(strict_types = 1);

namespace BraveRats\Collections;

use BraveRats\Entities\Character;
use BraveRats\Entities\Characters\Musician;
use BraveRats\Exceptions\Characters\CharacterNotFound;
use BraveRats\Entities\Characters\Spy;
use BraveRats\Entities\Characters\Ambassador;
use BraveRats\Entities\Characters\Assasin;
use BraveRats\Entities\Characters\General;
use BraveRats\Entities\Characters\Prince;
use BraveRats\Entities\Characters\Princess;
use BraveRats\Entities\Characters\Wizard;

class Characters implements \IteratorAggregate
{
    private
        $characters;

    public function __construct()
    {
        $this->characters = [
            new Ambassador(),
            new Assasin(),
            new General(),
            new Musician(),
            new Prince(),
            new Princess(),
            new Wizard(),
            new Spy(),
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
            $characters[$character->strength()] = $character->label();
        }

        ksort($characters);

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
