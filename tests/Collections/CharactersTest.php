<?php

declare(strict_types = 1);

namespace BraveRats\Collections;

use PHPUnit\Framework\TestCase;
use BraveRats\Entities\Character;
use BraveRats\Entities\Characters\Musician;
use BraveRats\Entities\Characters\NullCharacter;

class CharactersTest extends TestCase
{
    public function testContains()
    {
        $characterCollection = new Characters();
        $character = new Musician();

        $loadedCharacter = $characterCollection->getCharacterFromLabel($character->label());

        $this->assertEquals($character, $loadedCharacter);
    }

    /**
     * @expectedException \BraveRats\Exceptions\Characters\CharacterNotFound
     */
    public function testNotContains()
    {
        $characterCollection = new Characters();
        $character = new NullCharacter();

        $characterCollection->getCharacterFromLabel($character->label());
    }

    /**
     * @expectedException \BraveRats\Exceptions\Characters\CharacterNotFound
     */
    public function testRemove()
    {
        $characterCollection = new Characters();
        $character = new Musician();

        $characterCollection->remove($character);

        $this->assertFalse($characterCollection->getCharacterFromLabel($character->label()));
    }
}
