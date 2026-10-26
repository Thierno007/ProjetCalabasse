<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'demet:make:entity',
    description: 'Crée une entité (ou la met à jour)',
)]
class DemetMakeEntityCommand extends Command
{
    protected function configure(): void
    {
        $this->addArgument('name', InputArgument::OPTIONAL, 'Nom de l\'entité (ex: Membre)');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $args = [];
        if ($name = $input->getArgument('name')) {
            $args['name'] = $name;
        }

        $code = $this->getApplication()
            ->find('make:entity')
            ->run(new ArrayInput($args), $output);

        if ($code === Command::SUCCESS) {
            $io->success('Entité prête 🧱');
        }

        return $code;
    }
}