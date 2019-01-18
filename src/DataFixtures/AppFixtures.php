<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\City;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $city1 = new City();
        $city1->setCityCode('34RTET4');
        $city1->setCity('panam');
        
        $city2 = new City();
        $city2->setCityCode('34RQS7');
        $city2->setCity('toulouse');
        
        $manager->persist($city1);
        $manager->persist($city2);

        $manager->flush();
    }
}
