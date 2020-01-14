<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{

    const PROGRAMS = [

        'Walking Dead' => [

            'summary' => 'Le policier Rick Grimes se réveille après un long coma. Il découvre avec effarement que le monde, ravagé par une épidémie, est envahi par les morts-vivants.',

            'category' => 'categorie_4',
            
            'country' => 'United States',

            'year' => '2011',

            'poster' => 'https://static.mmzstatic.com/wp-content/uploads/2018/05/manquer-a-son-chat.jpg',

            'slug' => 'Walking Dead',

        ],

        'The Haunting Of Hill House' => [

            'summary' => 'Plusieurs frères et sœurs qui, enfants, ont grandi dans la demeure qui allait devenir la maison hantée la plus célèbre des États-Unis, sont contraints de se réunir pour finalement affronter les fantômes de leur passé.',

            'category' => 'categorie_4',

            'country' => 'United States',

            'year' => '2011',

            'poster' => 'https://static.mmzstatic.com/wp-content/uploads/2018/05/manquer-a-son-chat.jpg',

            'slug' => 'The Haunting Of Hill House',

        ],

        'American Horror Story' => [

            'summary' => 'A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct.',

            'category' => 'categorie_4',

            'country' => 'United States',

            'year' => '2011',

            'poster' => 'https://static.mmzstatic.com/wp-content/uploads/2018/05/manquer-a-son-chat.jpg',

            'slug' => 'American Horror Story',

        ],

        'Love Death And Robots' => [

            'summary' => 'Un yaourt susceptible, des soldats lycanthropes, des robots déchaînés, des monstres-poubelles, des chasseurs de primes cyborgs, des araignées extraterrestres et des démons assoiffés de sang.',

            'category' => 'categorie_4',

            'country' => 'United States',

            'year' => '2011',

            'poster' => 'https://static.mmzstatic.com/wp-content/uploads/2018/05/manquer-a-son-chat.jpg',

            'slug' => 'Love Death And Robots',

        ],

        'Penny Dreadful' => [

            'summary' => 'Dans le Londres ancien, Vanessa Ives, une jeune femme puissante aux pouvoirs hypnotiques, allie ses forces à celles de Ethan, un garçon rebelle et violent aux allures de cowboy, et de Sir Malcolm, un vieil homme riche aux ressources inépuisables.',

            'category' => 'categorie_4',

            'country' => 'United States',

            'year' => '2011',

            'poster' => 'https://static.mmzstatic.com/wp-content/uploads/2018/05/manquer-a-son-chat.jpg',

            'slug' => 'Penny Dreadful',

        ],

        'Fear The Walking Dead' => [

            'summary' => 'La série se déroule au tout début de l épidémie relatée dans la série mère The Walking Dead et se passe dans la ville de Los Angeles, et non à Atlanta. Madison est conseillère dans un lycée de Los Angeles.',

            'category' => 'categorie_4',

            'country' => 'United States',

            'year' => '2011',

            'poster' => 'https://static.mmzstatic.com/wp-content/uploads/2018/05/manquer-a-son-chat.jpg',

            'slug' => 'Fear The Walking Dead',

        ],

    ];


    public function load(ObjectManager $manager)
    {
        $i = 0;
        $slugify = new Slugify();
        foreach (self::PROGRAMS as $title => $data) {
            $program = new Program();
            $program->setTitle($title);
            $program->setSynopsis($data['summary']);
            $program->setCountry($data['country']);
            $program->setYear($data['year']);
            $program->setPoster($data['poster']);
            $program->setCategory($this->getReference('categorie_0'));
            
            
            //Service Slugify
            $slug = $slugify->generate($program->getTitle());
            $program->setSlug($slug);
            // categorie_0 fait référence à la première catégorie générée.
            $manager->persist($program);
            //$this->addReference('walking', $program);  
            $this->addReference('program_'.$i, $program);
            $i++;
        }
        $manager->flush();
    }

    public function getDependencies()  

    {  

    return [CategoryFixtures::class];  

    }
}