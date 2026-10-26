<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'demet:cache:clear',
    description: 'Vide le cache de l\'application',
)]
class DemetCacheClearCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $code = $this->getApplication()
            ->find('cache:clear')
            ->run(new ArrayInput([]), $output);

        if ($code === Command::SUCCESS) {
            $io->success('Cache vidé 🧹');
        } else {
            $io->error('Échec du vidage du cache');
        }

        return $code;
    }
}