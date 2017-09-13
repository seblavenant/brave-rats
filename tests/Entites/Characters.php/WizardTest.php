<?php

declare(strict_types = 1);

namespace BraveRats\Entities\Characters;

use PHPUnit\Framework\TestCase;
use BraveRats\Entities\Characters\Wizard;

class WizardTest extends TestCase
{
    public function testFight()
    {
        $winner = (new Wizard())->fight(new Ambassador());
        $this->assertTrue($winner instanceof Wizard, 'Wizard gagne contre Ambassador');

        $winner = (new Wizard())->fight(new General());
        $this->assertTrue($winner instanceof General, 'Wizard perd contre General');

        $winner = (new Wizard())->fight(new Wizard(), 'Wizard egalite contre lui même');
        $this->assertNull($winner);
    }
}
