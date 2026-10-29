<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;

#[AsCommand(
    name: 'demet:migration',
    description: 'Génère la migration et l\'exécute',
)]
class DemetMigrationCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $projectDir = dirname(__DIR__, 2);

        $steps = [
            ['make:migration'],
            ['doctrine:migrations:migrate', '--no-interaction'],
        ];

        foreach ($steps as $step) {
            $process = new Process([PHP_BINARY, 'bin/console', ...$step], $projectDir);
            $process->setTimeout(120);

            $code = $process->run(fn ($type, $buffer) => $output->write($buffer));

            if ($code !== Command::SUCCESS) {
                $io->error("Échec sur {$step[0]}");
                return $code;
            }
        }

        $io->success('Migration générée et exécutée 🚀');

        return Command::SUCCESS;
    }
}