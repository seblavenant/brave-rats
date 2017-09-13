<?php

declare(strict_types = 1);

namespace BraveRats\Entities;

class Game
{
    private
        $player1,
        $player2,
        $roundCounter;

    public function addPlayers(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->roundCounter = 0;
    }

    public function ended(): bool
    {
        return $this->roundCounter > 8 ||
            $this->player1->hasWinGame() ||
            $this->player2->hasWinGame();
    }

    public function getWinner(): ?Player
    {
        if(! $this->ended())
        {
            return null;
        }

        if($this->player1->hasWinGame())
        {
            return $this->player1;
        }

        if($this->player2->hasWinGame())
        {
            return $this->player2;
        }
    }
}

