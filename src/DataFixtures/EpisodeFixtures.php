<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        //foreach (self::EPISODES as $key => $name)
        for ($i = 0; $i < 50; $i++)
        {
            $episode = new Episode();
            $episode->setTitle($faker->text);
            $episode->setSynopsis($faker->text);
            $episode->setNumber($faker->buildingNumber);
            $manager->persist($episode);
            //$this->addReference('episode_' . $key, $episode);
            $this->addReference('episode_' . $i, $episode);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }
}