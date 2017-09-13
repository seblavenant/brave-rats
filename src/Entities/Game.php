<?php

declare(strict_types = 1);

namespace BraveRats\Entities;

class Game
{
    private
        $player1,
        $player2;

    public function addPlayers(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function ended()
    {
        return false;
    }
}

