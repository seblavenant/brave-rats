<?php

declare(strict_types = 1);

namespace BraveRats\Entities;

class Round
{
    private
        $point,
        $winner;

    public function __construct($point = 1)
    {
        $this->point = $point;
    }

    public function run(Player $player1, Player $player2): Round
    {
        $character1 = $player1->getCurrentCharacter();
        $character2 = $player2->getCurrentCharacter();

        if($character1->strength() > $character2->strength())
        {
            $this->winner = $player1->win($this);
        }
        elseif($character1->strength() < $character2->strength())
        {
            $this->winner = $player2->win($this);
        }
        else
        {
            return new Round($this->point + 1);
        }

        return new Round();
    }

    public function getPoint(): int
    {
        return $this->point;
    }

    public function getWinner(): ?Player
    {
        return $this->winner;
    }
}
