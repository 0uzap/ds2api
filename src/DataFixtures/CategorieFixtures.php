<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Categorie;

class CategorieFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
       
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<30;$i++){
            $categorie = new Categorie();
            $categorie->setNom($this->faker->word());
            $manager->persist($categorie);

            $this->addReference('categorie'. $i, $categorie);
        }
        
        $manager->flush();
    }
}
