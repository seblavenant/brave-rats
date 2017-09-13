<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use PHPUnit\Framework\TestCase;
use BraveRats\Entities\Characters\Musician;
use BraveRats\Entities\Characters\Wizard;

class MusicianTest extends TestCase
{
    public function testFight()
    {
        $winner = (new Musician())->fight(new Wizard());
        $this->assertTrue($winner instanceof Wizard, 'Musician perd contre Wizard');
        $winner = (new Wizard())->fight(new Musician());
        $this->assertTrue($winner instanceof Wizard, 'Wizard perd contre Musician');

        $winner = (new Musician())->fight(new Princess());
        $this->assertNull($winner, 'Musician egalité contre Princess');
        $winner = (new Princess())->fight(new Musician());
        $this->assertNull($winner, 'Princess egalité contre Musician');
    }
}