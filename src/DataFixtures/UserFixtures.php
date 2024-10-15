<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE_TAG = 'user-';

    public function load(ObjectManager $manager): void
    {

        $usersData = [
            [
                'username' => 'jdoe',
                'firstname' => 'John',
                'lastname' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-01-01'),
                'quote' => 'Etiam elementum turpis ac metus commodo, fermentum blandit tortor placerat. Vestibulum rutrum, turpis eget viverra rhoncus, dui enim pharetra augue, nec sagittis velit est quis arcu.',
                'emploi' => 'Développeur Full-Stack Senior',
            ],
            [
                'username' => 'asmith',
                'firstname' => 'Alice',
                'lastname' => 'Smith',
                'email' => 'alice.smith@example.com',
                'password' => 'securepassword',
                'createdAt' => new \DateTime('2023-02-10'),
                'quote' => 'Suspendisse a nisi eleifend, iaculis magna quis, posuere ante. Maecenas commodo tellus tellus, vitae pellentesque diam sagittis vel.',
                'emploi' => 'Développeur Back-End Senior',
            ],
            [
                'username' => 'bwilliams',
                'firstname' => 'Bob',
                'lastname' => 'Williams',
                'email' => 'bob.williams@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-03-15'),
                'quote' => 'Integer tempus libero posuere enim viverra placerat. Nulla facilisi. Donec blandit ultricies rutrum. In auctor mauris nibh, et lobortis turpis facilisis sit amet. In eu diam a tellus congue varius vitae in neque.',
                'emploi' => 'Développeur Full-Stack Junior',
            ],
            [
                'username' => 'jdoe',
                'firstname' => 'Jane',
                'lastname' => 'Doe',
                'email' => 'jane.doe@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-04-20'),
                'quote' => 'Curabitur sagittis libero vitae nibh consequat pellentesque. Ut imperdiet maximus risus convallis volutpat. Sed luctus, enim at pharetra aliquet, metus velit posuere leo, tincidunt elementum lorem velit a est.',
                'emploi' => 'Développeur Front Junior',
            ],
            [
                'username' => 'jclaude',
                'firstname' => 'Jean',
                'lastname' => 'Claude',
                'email' => 'jean.claude@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-04-20'),
                'quote' => 'Sed nisl mauris, congue a scelerisque in, suscipit quis diam. Mauris nec ultrices est. Sed tristique a nisl nec congue. Vestibulum finibus velit vitae massa volutpat mattis.',
                'emploi' => 'Développeur Full-Stack Retraité',
            ],
            [
                'username' => 'jjackson',
                'firstname' => 'Janette',
                'lastname' => 'Jackson',
                'email' => 'janette.jackson@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-04-20'),
                'quote' => "Peek in the shadow, I come into the light, If you tell me I'm wrong, Then you better prove you're right, And you're sellin' out souls, But I, I care about mine, I've got to get stronger, And I won't give up the fight.",
                'emploi' => 'Chanteuse et danseuse américaine',
            ],
            [
                'username' => 'pjones',
                'firstname' => 'Paul',
                'lastname' => 'Jones',
                'email' => 'paul.jones@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-05-10'),
                'quote' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.',
                'emploi' => 'Développeur Full-Stack Junior',
            ],
            [
                'username' => 'hpotter',
                'firstname' => 'Harry',
                'lastname' => 'Potter',
                'email' => 'harry.potter@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-06-15'),
                'quote' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
                'emploi' => 'Sorcier Full-Stack Junior',
            ],
            [
                'username' => 'rweasley',
                'firstname' => 'Ron',
                'lastname' => 'Weasley',
                'email' => 'ron.weasley@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-07-20'),
                'quote' => "J'étais musicien indépendant, mais la COVID a tout stoppé. On m'a parlé d'ADRAR Classrooms, ça m'a ouvert des opportunités professionnelles insoupçonnées.",
                'emploi' => 'Sorcier Back-End Junior',
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
            $user->setQuote($data['quote']);
            $user->setEmploi($data['emploi']);
            $manager->persist($user);
            $this->addReference(self::USER_REFERENCE_TAG . $i, $user);
        }
        $manager->flush();
    }
}