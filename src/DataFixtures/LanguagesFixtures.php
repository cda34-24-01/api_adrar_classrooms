<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use App\Entity\Languages;

class LanguagesFixtures extends Fixture
{
    public const LANGUAGES_REFERENCE_TAG = 'languages-';
    public const LANGUAGES_COUNT = 10;
    public function load(ObjectManager $manager): void
    {
        $faker = FakerFactory::create('fr_FR');

        for ($i = 0; $i < self::LANGUAGES_COUNT; $i++) {
            $languages = new languages();
            $languages->settitle($faker->word());
            $languages->setImg($faker->word());


            $manager->persist($languages);
            $this->addReference(self::LANGUAGES_REFERENCE_TAG . $i, $languages);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CoursFixtures::class
        ];
    }
}
