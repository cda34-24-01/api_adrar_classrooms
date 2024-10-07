<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
// use Faker\Factory;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE_TAG = 'user-';
    public const USER_COUNT = 9;

    public function load(ObjectManager $manager): void
    {
        // $faker = Factory::create('fr_FR');

        $usersData = [
            [
                'username' => 'jdoe',
                'firstname' => 'John',
                'lastname' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-01-01'),
            ],
            [
                'username' => 'asmith',
                'firstname' => 'Alice',
                'lastname' => 'Smith',
                'email' => 'alice.smith@example.com',
                'password' => 'securepassword',
                'createdAt' => new \DateTime('2023-02-10'),
            ],
            [
                'username' => 'bwilliams',
                'firstname' => 'Bob',
                'lastname' => 'Williams',
                'email' => 'bob.williams@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-03-15'),
            ],
            [
                'username' => 'jdoe',
                'firstname' => 'Jane',
                'lastname' => 'Doe',
                'email' => 'jane.doe@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-04-20'),
            ],
            [
                'username' => 'jclaude',
                'firstname' => 'Jean',
                'lastname' => 'Claude',
                'email' => 'jean.claude@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-04-20'),
            ],
            [
                'username' => 'jjackson',
                'firstname' => 'Janette',
                'lastname' => 'Jackson',
                'email' => 'janette.jackson@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-04-20'),
            ],
            [
                'username' => 'pjones',
                'firstname' => 'Paul',
                'lastname' => 'Jones',
                'email' => 'paul.jones@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-05-10'),
            ],
            [
                'username' => 'hpotter',
                'firstname' => 'Harry',
                'lastname' => 'Potter',
                'email' => 'harry.potter@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-06-15'),
            ],
            [
                'username' => 'rweasley',
                'firstname' => 'Ron',
                'lastname' => 'Weasley',
                'email' => 'ron.weasley@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-07-20'),
            ],
        ];

        
        foreach ($usersData as $i => $data) { 
            $user = new User();
            $user->setUsername($data['username']);
            $user->setFirstname($data['firstname']);
            $user->setLastname($data['lastname']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setCreatedAt($data['createdAt']);

            $manager->persist($user);
            $this->addReference(self::USER_REFERENCE_TAG . $i, $user);
        }
        $manager->flush();
    }
}