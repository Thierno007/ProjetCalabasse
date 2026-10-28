<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'demet:migration',
    description: 'Génère la migration et l\'exécute',
)]
class DemetMigrationCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $steps = [
            ['make:migration', []],
            ['doctrine:migrations:migrate', []],
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

        $io->success('Migration générée et exécutée 🚀');

        return Command::SUCCESS;
    }
}