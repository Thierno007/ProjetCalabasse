<?php

namespace App\DataFixtures;

use App\Entity\Groupement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $data= [
            ['AIZEN','770123456','DAKAR-FANN'],
            ['BAMBA','770123457','DAKAR-PLATEAU'],
            ['CISS','770123458','DAKAR-FOUNDI'],
            ['DIOP','770123459','DAKAR-OUAKAM'],
            ['FALL','770123460','DAKAR-PARCELLE'],
            ['GUEYE','770123461','DAKAR-MEDINA'],
            ['HANE','770123462','DAKAR-POINT E'],
            ['NDIAYE','770123463','DAKAR-ALMADIES'],
            ['SOW','770123464','DAKAR-GORÉE'],
            ['TOURE','770123465','DAKAR-KAOLACK']
        ];

        foreach ($data as $value=>[$nom,$tel,$adresse]) {
            $groupement = (new Groupement())
                ->setNom($nom)
                ->setTel($tel)
                ->setAdresse($adresse);
            $manager->persist($groupement);
        }

        $manager->flush();
    }
}
