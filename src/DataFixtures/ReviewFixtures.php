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
    public const REVIEW_COUNT = 8;

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            CoursFixtures::class,
            LanguagesFixtures::class
        ];
    }
    public function load(ObjectManager $manager): void
    {
        // $faker = Factory::create('fr_FR');
        $reviewData = [
            [
                'user_id' => 1,
                'cours_id' => 1,
                'language_id' => 1,
                'content' => 'Super cours, je recommande !',
                'rating' => 5,
                'created_at' => new \DateTime('2024-01-01')
            ],
            [
                'user_id' => 2,
                'cours_id' => 2,
                'language_id' => 2,
                'content' => 'Cours très complet, j\'ai appris beaucoup de choses',
                'rating' => 4,
                'created_at' => new \DateTime('2024-02-15')
            ],
            [
                'user_id' => 3,
                'cours_id' => 3,
                'language_id' => 3,
                'content' => 'Je suis déçu, je m\'attendais à mieux',
                'rating' => 2,
                'created_at' => new \DateTime('2024-03-30')
            ],
            [
                'user_id' => 4,
                'cours_id' => 4,
                'language_id' => 4,
                'content' => 'Cours très intéressant, je recommande',
                'rating' => 5,
                'created_at' => new \DateTime('2024-04-10')
            ],
            [
                'user_id' => 5,
                'cours_id' => 5,
                'language_id' => 5,
                'content' => 'Je suis déçu, je m\'attendais à mieux',
                'rating' => 2,
                'created_at' => new \DateTime('2024-05-20')
            ],
            [
                'user_id' => 6,
                'cours_id' => 6,
                'language_id' => 6,
                'content' => 'Cours très complet, j\'ai appris beaucoup de choses',
                'rating' => 4,
                'created_at' => new \DateTime('2024-06-30')
            ],
            [
                'user_id' => 7,
                'cours_id' => 7,
                'language_id' => 7,
                'content' => 'Super cours, je recommande !',
                'rating' => 5,
                'created_at' => new \DateTime('2024-07-10')
            ],
            [
                'user_id' => 8,
                'cours_id' => 8,
                'language_id' => 8,
                'content' => 'Je suis déçu, je m\'attendais à mieux',
                'rating' => 2,
                'created_at' => new \DateTime('2024-08-20')
            ],
            
        ];

        foreach ($reviewData as $i => $data) {
            $review = new Review();
            $review->setUser($this->getReference(UserFixtures::USER_REFERENCE_TAG . $data['user_id']));
            $review->setCours($this->getReference(CoursFixtures::COURS_REFERENCE_TAG . $data['cours_id']));
            $review->setLanguage($this->getReference(LanguagesFixtures::LANGUAGES_REFERENCE_TAG . $data['language_id']));
            $review->setContent($data['content']);
            $review->setRating($data['rating']);
            $review->setCreatedAt($data['created_at']);

            $manager->persist($review);
            $this->addReference(self::REVIEW_REFERENCE_TAG . $i, $review);
        }
        $manager->flush();
    }
    
}
