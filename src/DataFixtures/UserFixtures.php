<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE_TAG = 'user-';
    public const USER_COUNT = 15;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        for ($i = 0; $i < self::USER_COUNT; $i++) { 
            $user = new User();
            $user->setUsername($faker->firstName);
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setEmail($faker->email);
            $user->setPassword($faker->password);
            $user->setCreatedAt($faker->dateTime);

            $manager->persist($user);
            $this->addReference(self::USER_REFERENCE_TAG . $i, $user);
        }
        $manager->flush();
    }
}