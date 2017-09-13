<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

class AbstractCharacter
{
    public $strenghtIncreaser = 0;

    public function increaseStrength($strength)
    {
        $this->strenghtIncreaser = $strength;
    }
}