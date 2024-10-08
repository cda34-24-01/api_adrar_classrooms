<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use App\Entity\Chapters;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ChaptersFixtures extends Fixture
implements DependentFixtureInterface
{
    public const CHAPTERS_REFERENCE_TAG = 'chapters-';
    public const CHAPTERS_COUNT = 10;
    public function load(ObjectManager $manager): void


    {
        $dataLength = CoursFixtures::getcoursesData();

        $faker = FakerFactory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $chapter = new Chapters();
            $chapter->setTitle($faker->word());
            $chapter->setContent($faker->word());
            $chapter->setCours($this->getReference(CoursFixtures::COURS_REFERENCE_TAG . rand(0, count($dataLength) - 1)));
            $manager->persist($chapter);
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
