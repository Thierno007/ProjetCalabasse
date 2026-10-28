<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'demet:db:create',
    description: 'Supprime la base de données si elle existe, puis la recrée',
)]
class DemetDbCreateCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        if (!$io->confirm('Ça va SUPPRIMER la base existante. Continuer ?', false)) {
            $io->warning('Annulé.');
            return Command::SUCCESS;
        }

        $steps = [
            ['doctrine:database:drop', ['--if-exists' => true, '--force' => true]],
            ['doctrine:database:create', []],
        ];

        foreach ($steps as [$name, $args]) {
            $arrayInput = new ArrayInput($args);
            $arrayInput->setInteractive(false);

            $code = $this->getApplication()->find($name)->run($arrayInput, $output);

            if ($code !== Command::SUCCESS) {
                $io->error("Échec sur $name");
                return $code;
            }
        }

        $io->success('Base supprimée puis recréée 🚀');

        return Command::SUCCESS;
    }
}