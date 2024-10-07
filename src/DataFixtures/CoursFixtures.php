<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
// use Faker\Factory as FakerFactory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CoursFixtures extends Fixture
implements DependentFixtureInterface

{
    public const COURS_REFERENCE_TAG = 'cours-';
    public const COURS_COUNT = 9;
    public function getDependencies(): array
    {
        return [
            LanguagesFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void
    {
         $coursesData = [
            [
                'title' => 'Introduction au PHP',
                'level' => 'Débutant',
                'estimatedTime' => new \DateInterval('PT4H'), // 4 hours
                'createdAt' => new \DateTime('2024-01-01'),
                'validated' => true,
                'languageIndex' => 0,
                'description' => 'Découvrez les bases du PHP avec ce cours d\'introduction.'
            ],
            [
                'title' => 'Symfony avancé',
                'level' => 'Avancé',
                'estimatedTime' => new \DateInterval('PT8H'), // 8 hours
                'createdAt' => new \DateTime('2024-02-15'),
                'validated' => true,
                'languageIndex' => 1,
                'description' => 'Approfondissez vos connaissances de Symfony avec ce cours avancé.'
            ],
            [
                'title' => 'Découverte de Python',
                'level' => 'Intermédiaire',
                'estimatedTime' => new \DateInterval('PT6H'), // 6 hours
                'createdAt' => new \DateTime('2024-03-30'),
                'validated' => true,
                'languageIndex' => 2,
                'description' => 'Apprenez les bases de Python avec ce cours de découverte.'
            ],
            [
                'title' => 'Java pour les nuls',
                'level' => 'Débutant',
                'estimatedTime' => new \DateInterval('PT5H'), // 5 hours
                'createdAt' => new \DateTime('2024-04-10'),
                'validated' => true,
                'languageIndex' => 3,
                'description' => 'Découvrez les bases de Java avec ce cours pour débutants.'
            ],
            [
                'title' => 'JavaScript pour les enfants',
                'level' => 'Débutant',
                'estimatedTime' => new \DateInterval('PT3H'), // 3 hours
                'createdAt' => new \DateTime('2024-05-20'),
                'validated' => true,
                'languageIndex' => 4,
                'description' => 'Apprenez les bases de JavaScript avec ce cours pour les enfants.'
            ],
            [
                'title' => 'Angular pour les nuls',
                'level' => 'Intermédiaire',
                'estimatedTime' => new \DateInterval('PT7H'), // 7 hours
                'createdAt' => new \DateTime('2024-06-25'),
                'validated' => true,
                'languageIndex' => 5,
                'description' => 'Découvrez les bases d\'Angular avec ce cours pour débutants.'
            ],
            [
                'title' => 'Découverte de Ruby',
                'level' => 'Intermédiaire',
                'estimatedTime' => new \DateInterval('PT6H'), // 6 hours
                'createdAt' => new \DateTime('2024-07-30'),
                'validated' => true,
                'languageIndex' => 6,
                'description' => 'Apprenez les bases de Ruby avec ce cours de découverte.'
            ],
            [
                'title' => 'Node.js pour les nuls',
                'level' => 'Débutant',
                'estimatedTime' => new \DateInterval('PT4H'), // 4 hours
                'createdAt' => new \DateTime('2024-08-10'),
                'validated' => true,
                'languageIndex' => 7,
                'description' => 'Découvrez les bases de Node.js avec ce cours pour débutants.'
            ],
            [
                'title' => 'Découverte de C#',
                'level' => 'Intermédiaire',
                'estimatedTime' => new \DateInterval('PT6H'), // 6 hours
                'createdAt' => new \DateTime('2024-09-20'),
                'validated' => true,
                'languageIndex' => 8,
                'description' => 'Apprenez les bases de C# avec ce cours de découverte.'
            ],
        ];

        // $faker = FakerFactory::create('fr_FR');

        foreach ($coursesData as $i => $data) {
            $cours = new Cours();
            $cours->settitle($data['title']);
            $cours->setLevel($data['level']);
            $cours->setEstimatedTime((new \DateTime())->add($data['estimatedTime']));
            $cours->setCreatedAt($data['createdAt']);
            $cours->setValidated($data['validated']);
            $cours->setLanguage($this->getReference(LanguagesFixtures::LANGUAGES_REFERENCE_TAG . rand(0, LanguagesFixtures::LANGUAGES_COUNT - 1)));
            $cours->setDescription($data['description']);

            $manager->persist($cours);
            $this->addReference(self::COURS_REFERENCE_TAG . $i, $cours);
        }
        $manager->flush();
    }
}
