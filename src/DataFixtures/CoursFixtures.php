<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CoursFixtures extends Fixture
implements DependentFixtureInterface

{
    public const COURS_REFERENCE_TAG = 'cours-';
    public const COURS_COUNT = 10;
    public function getDependencies(): array
    {
        return [
            LanguagesFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void
    {
        $faker = FakerFactory::create('fr_FR');

        for ($i = 0; $i < self::COURS_COUNT; $i++) {
            $cours = new Cours();
            $cours->settitle($faker->word());
            $cours->setLevel($faker->word());
            $cours->setEstimatedTime($faker->dateTime());
            $cours->setCreatedAt($faker->dateTime());
            $cours->setValidated($faker->boolean(false));
            $cours->setLanguage($this->getReference(LanguagesFixtures::LANGUAGES_REFERENCE_TAG . rand(0, LanguagesFixtures::LANGUAGES_COUNT - 1)));

            $manager->persist($cours);
            $this->addReference(self::COURS_REFERENCE_TAG . $i, $cours);
        }
        $manager->flush();
    }
}
