<?php

declare(strict_types = 1);

namespace BraveRats\Entities;

use PHPUnit\Framework\TestCase;
use BraveRats\Entities\Characters\Musician;

class PlayerTest extends TestCase
{
    public function testChoose()
    {
        $player = new Player();

        $character = new Musician();

        $player->choose($character->label());

        $this->assertEquals($character, $player->getCurrentCharacter());
    }

    /**
     * @expectedException \BraveRats\Exceptions\Characters\CharacterNotFound
     */
    public function testChooseInvalidCharacter()
    {
        $player = new Player();

        $player->choose('pouet');
    }
}