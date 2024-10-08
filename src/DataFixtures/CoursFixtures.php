<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory as FakerFactory;


class CoursFixtures extends Fixture
implements DependentFixtureInterface

{
    public const COURS_REFERENCE_TAG = 'cours-';
    public static function getcoursesData(): array
    {
        return [
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
                'title' => 'C++ pour les nuls',
                'level' => 'Débutant',
                'estimatedTime' => new \DateInterval('PT7H'), // 7 hours
                'createdAt' => new \DateTime('2024-06-25'),
                'validated' => true,
                'languageIndex' => 5,
                'description' => 'Découvrez les bases de C++ avec ce cours pour les débutants.'
            ],
            [
                'title' => 'Découverte de C#',
                'level' => 'Intermédiaire',
                'estimatedTime' => new \DateInterval('PT6H'), // 6 hours
                'createdAt' => new \DateTime('2024-09-20'),
                'validated' => true,
                'languageIndex' => 6,
                'description' => 'Apprenez les bases de C# avec ce cours de découverte.'
            ],
            [
                'title' => 'Découverte de Ruby',
                'level' => 'Intermédiaire',
                'estimatedTime' => new \DateInterval('PT6H'), // 6 hours
                'createdAt' => new \DateTime('2024-07-30'),
                'validated' => true,
                'languageIndex' => 7,
                'description' => 'Apprenez les bases de Ruby avec ce cours de découverte.'
            ],
            [
                'title' => 'Go pour les nuls',
                'level' => 'Débutant',
                'estimatedTime' => new \DateInterval('PT4H'), // 4 hours
                'createdAt' => new \DateTime('2024-08-10'),
                'validated' => true,
                'languageIndex' => 8,
                'description' => 'Découvrez les bases de Go avec ce cours pour débutants.'
            ],
            [
                'title' => 'Swift pour les enfants',
                'level' => 'Débutant',
                'estimatedTime' => new \DateInterval('PT3H'), // 3 hours
                'createdAt' => new \DateTime('2024-10-15'),
                'validated' => true,
                'languageIndex' => 9,
                'description' => 'Apprenez les bases de Swift avec ce cours pour les enfants.'
            ]
        ];
    }
    public function getDependencies(): array
    {
        return [
            LanguagesFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void

    {
        $faker = FakerFactory::create();
        $coursesData = self::getCoursesData();

        foreach ($coursesData as $i => $data) {
            $cours = new Cours();
            $cours->settitle($data['title']);
            $cours->setLevel($data['level']);
            $cours->setEstimatedTime((new \DateTime())->add($data['estimatedTime']));
            $cours->setCreatedAt($data['createdAt']);
            $cours->setValidated($data['validated']);
            $cours->setImgUrl($faker->imageUrl(640, 480, ''));
            $cours->setLanguage($this->getReference(LanguagesFixtures::LANGUAGES_REFERENCE_TAG . $data['languageIndex']));
            $cours->setDescription($data['description']);

            $manager->persist($cours);
            $this->addReference(self::COURS_REFERENCE_TAG . $i, $cours);
        }
        $manager->flush();
    }
}
