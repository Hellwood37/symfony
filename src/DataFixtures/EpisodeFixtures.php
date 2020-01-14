<?php

namespace App\DataFixtures;

use App\Service\Slugify;
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
        $slugify = new Slugify();
        for ($i = 0; $i < 50; $i++)
        {
            $episode = new Episode();
            $episode->setTitle($faker->text);
            $episode->setSynopsis($faker->text);
            $episode->setNumber($faker->buildingNumber);
            $episode->setSlug($faker->slug);

            //Service Slugify
            $slug = $slugify->generate($episode->getTitle());
            $episode->setSlug($slug);

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