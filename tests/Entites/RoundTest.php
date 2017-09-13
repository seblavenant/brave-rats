<?php

declare(strict_types = 1);

namespace BraveRats\Entities;

use PHPUnit\Framework\TestCase;
use BraveRats\Entities\Characters\Musician;

class RoundTest extends TestCase
{
    private
        $player1,
        $player2;

    public function setUp()
    {
        $this->player1 = new Player('poney');
        $this->player2 = new Player('poney');
    }

    /**
     * @dataProvider providerTestCharacterWin
     */
    public function testCharacterWin(string $character1, string $character2, ?Player $winner)
    {
        $this->player1->choose($character1);
        $this->player2->choose($character2);

        $round = new Round();

        $round->run($this->player1, $this->player2);

        $this->assertSame($round->getWinner(), $winner);

    }

    public function providerTestCharacterWin()
    {
        return [
            'musicien / prince' =>  [
              'character1' => 'Musicien',
              'character2' => 'Prince',
              'winner' => null,
            ],
//             'princess / prince' =>  [
//                 'character1' => 'Princesse',
//                 'character2' => 'Prince',
//                 'winner' => $this->player1,
//             ],

        ];
    }

}