<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Location;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LocationFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
       
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<30;$i++){
            $location = new Location();
            $location->setDateDebutLocation($this->faker->dateTime());
            $location->setDateFinLocation($this->faker->dateTime());
            $location->setIdBijoux($this->getReference('bijou'. $i));
            $location->setIdClient($this->getReference('client'. $i));
            $manager->persist($location);
        }
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BijouFixtures::class,
            ClientsFixtures::class,
        ];
    }
}
