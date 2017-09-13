<?php

namespace BraveRats\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use BraveRats\Entities\Game as GameEntity;
use BraveRats\Entities\Player;
use BraveRats\Entities\Round;
use Symfony\Component\Console\Question\ChoiceQuestion;
use BraveRats\Entities\Character;
use BraveRats\Collections\Characters;

class Game extends Command
{
    protected function configure()
    {
        $this->setName('game:play')
            ->setDescription('Play game');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $game = new GameEntity();

        $player1 = new Player();
        $player2 = new Player();
        $game->addPlayers($player1, $player2);

        $round = new Round();

        while($game->ended() === false)
        {
            $character = $this->promptCharacterChoice($input, $output, $player1);
            $player1->choose($character);

            $character = $this->promptCharacterChoice($input, $output, $player2);
            $player2->choose($character);

            $round->run($player1, $player2);

            $round = new Round();
        }
    }

    private function promptCharacterChoice(InputInterface $input, OutputInterface $output, Player $player): string
    {
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            'Please select your character',
            $player->getAvailableCharacters()->toArray()
        );

        return $helper->ask($input, $output, $question);
    }
}
