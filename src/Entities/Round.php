<?php

declare(strict_types = 1);

namespace BraveRats\Entities;

use BraveRats\Entities\Characters\Musician;
use BraveRats\Entities\Characters\Princess;
use BraveRats\Entities\Characters\Ambassador;

class Round
{
    private
        $point,
        $winner,
        $specialPower;

    public function __construct($point = 1)
    {
        $this->point = $point;
        $this->specialPower = true;
    }

    public function run(Player $player1, Player $player2): Round
    {
        $character1 = $player1->getCurrentCharacter();
        $character2 = $player2->getCurrentCharacter();

        $character1Strength = $character1->strength();
        $character2Strength = $character2->strength();

        if($this->isInstanceOf($character1, $character2, '\BraveRats\Entities\Characters\Wizard'))
        {
            $this->specialPower = false;
        }

        if($this->specialPower)
        {
            if($this->isInstanceOf($character1, $character2, '\BraveRats\Entities\Characters\Musician'))
            {
                return new Round($this->point + 1);
            }

            if(
                $this->isInstanceOf($character1, $character2, '\BraveRats\Entities\Characters\Prince') &&
                $this->isInstanceOf($character1, $character2, '\BraveRats\Entities\Characters\Princess')
            )
            {
                $this->point = 4;
                if($character1 instanceof Princess)
                {
                    $this->winner = $player1->win($this);
                }
                else
                {
                    $this->winner = $player2->win($this);
                }

                return new Round();
            }

            if($this->isInstanceOf($character1, $character2, '\BraveRats\Entities\Characters\Assasin'))
            {
                $character1Strength *= -1;
                $character2Strength *= -1;
            }

            if($player = $this->getPlayerForInstance($player1, $player2, '\BraveRats\Entities\Characters\General'))
            {
                if($player instanceof Player)
                {
                    $player->increaseCharacterStrength(2);
                }
            }
        }

        if($character1Strength > $character2Strength)
        {
            $this->winner = $player1->win($this);
        }
        elseif($character1Strength < $character2Strength)
        {
            $this->winner = $player2->win($this);
        }
        else
        {
            return new Round($this->point + 1);
        }

        if($this->specialPower && $this->winner->getCurrentCharacter() instanceof Ambassador)
        {
            $this->point = 1;
            $this->winner->win($this);
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

    private function isInstanceOf(Character $character1, Character $character2, $instance)
    {
        if(
            $character1 instanceof $instance ||
            $character2 instanceof $instance
        )
        {
            return true;
        }

        return false;
    }

    private function getPlayerForInstance(Player $player1, Player $player2, $instance)
    {
        if(! $this->isInstanceOf($player1->getCurrentCharacter(), $player2->getCurrentCharacter(), $instance))
        {
            return null;
        }

        if($player1->getCurrentCharacter() instanceof $instance)
        {
            return $player1;
        }

        if($player2->getCurrentCharacter() instanceof $instance)
        {
            return $player2;
        }

        return null;
    }
}
