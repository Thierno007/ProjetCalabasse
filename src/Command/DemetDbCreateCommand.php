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
    description: 'Crée la base de données si elle n\'existe pas',
)]
class DemetDbCreateCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $code = $this->getApplication()
            ->find('doctrine:database:create')
            ->run(new ArrayInput(['--if-not-exists' => true]), $output);

        if ($code === Command::SUCCESS) {
            $io->success('Base prête 🚀');
        }

        return $code;
    }
}