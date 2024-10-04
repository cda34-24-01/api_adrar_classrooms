<?php

namespace App\DataFixtures;

use App\Entity\Review;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReviewFixtures extends Fixture implements DependentFixtureInterface
{
    public const REVIEW_REFERENCE_TAG = 'review-';
    public const REVIEW_COUNT = 15;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::REVIEW_COUNT; $i++) {
            $review = new Review();
            $review->setUser($this->getReference(UserFixtures::USER_REFERENCE_TAG . $faker->numberBetween(0, UserFixtures::USER_COUNT - 1)));
            $review->setCoursId($faker->numberBetween(1, 15));
            $review->setLanguageId($faker->numberBetween(1, 15));
            $review->setContent($faker->words(255, asText: true));
            $review->setRating($faker->numberBetween(1, 5));
            $review->setCreatedAt($faker->dateTime);

            $manager->persist($review);
            $this->addReference(self::REVIEW_REFERENCE_TAG . $i, $review);
        }
        $manager->flush();
    }
    
    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
