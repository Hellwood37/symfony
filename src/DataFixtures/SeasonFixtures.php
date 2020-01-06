<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        //foreach (self::SEASONS as $key => $name)
        for ($i = 0; $i < 50; $i++)
        {
            $season = new Season();
            $season->setDescription($faker->text);
            $season->setYear($faker->year);
            $season->setNumber($faker->randomDigit);
            $manager->persist($season);
            //$this->addReference('season_' . $key, $season);
            $this->addReference('season_' . $i, $season);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}