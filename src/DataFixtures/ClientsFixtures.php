<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Clients;

class ClientsFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
       
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<30;$i++){
            $client = new Clients();
            $client->setNom($this->faker->lastName());
			$client->setPrenom($this->faker->firstName());
            $client->setAdresseRue($this->faker->streetAddress());
            $client->setCodePostal($this->faker->postcode());
            $client->setVille($this->faker->city());
			$client->setEmail(strtolower($client->getPrenom()).'.'.strtolower($client->getNom()).'@'.$this->faker->freeEmailDomain());
			$client->setTelFixe($this->faker->phoneNumber());
            $client->setTelPortable($this->faker->phoneNumber());
            $manager->persist($client);

            $this->addReference('client'. $i, $client);
        }
        
        $manager->flush();
    }
}
