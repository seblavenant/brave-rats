<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use PHPUnit\Framework\TestCase;

class PrinceTest extends TestCase
{
    public function testFight()
    {
        $winner = (new Prince())->fight(new Princess());
        $this->assertTrue($winner instanceof Princess, 'Prince perd contre Princess');

        $winner = (new Prince())->fight(new Assassin());
        $this->assertTrue($winner instanceof Prince, 'Prince gagne contre Assasin');

        $winner = (new Prince())->fight(new Prince());
        $this->assertNull($winner, 'Prise egalité contre lui même');
    }
}
