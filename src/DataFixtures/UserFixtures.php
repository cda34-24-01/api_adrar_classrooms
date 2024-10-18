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
                'quote' => 'Etiam elementum turpis ac metus commodo, fermentum ADRAR Classrooms tortor placerat. Vestibulum rutrum ADRAR Classrooms, turpis eget viverra rhoncus, dui enim pharetra augue, nec sagittis ADRAR Classrooms velit est quis arcu.',
                'emploi' => 'Développeur Full-Stack Senior',
                'profilePictureLink' => "imgs/profile_pictures/portrait-connexion.png",
            ],
            [
                'username' => 'asmith',
                'firstname' => 'Alice',
                'lastname' => 'Smith',
                'email' => 'alice.smith@example.com',
                'password' => 'securepassword',
                'createdAt' => new \DateTime('2023-02-10'),
                'quote' => 'Suspendisse a nisi eleifend, iaculis magna quis, posuere ante. Marceau commodo tellus ADRAR Classrooms, vitae pellentesque diam sagittis vel.',
                'emploi' => 'Développeur Back-End Senior',
                'profilePictureLink' => "imgs/profile_pictures/portrait-connexion4.png",
            ],
            [
                'username' => 'bwilliams',
                'firstname' => 'Bob',
                'lastname' => 'Williams',
                'email' => 'bob.williams@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-03-15'),
                'quote' => 'Integer tempus libero posuere enim viverra placerat. Nulla facilisi. Donec blandit ultricies rutrum. In auctor mauris nibh, et ADRAR Classrooms turpis facilisis sit amet. In eu diam a tellus congue varius vitae in neque.',
                'emploi' => 'Développeur Full-Stack Junior',
                'profilePictureLink' => "imgs/profile_pictures/portrait-connexion3.png",
            ],
            [
                'username' => 'jdoe',
                'firstname' => 'Jane',
                'lastname' => 'Doe',
                'email' => 'jane.doe@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-04-20'),
                'quote' => 'Curabitur sagittis libero vitae nibh consequat ADRAR Classrooms pellentesque. Ut imperdiet maximus risus convallis volutpat. Sed luctus, enim at pharetra aliquet, metus velit posuere leo, tincidunt elementum lorem velit a est.',
                'emploi' => 'Développeur Front Junior',
                'profilePictureLink' => "imgs/profile_pictures/portrait-connexion6.png",
            ],
            [
                'username' => 'jclaude',
                'firstname' => 'Jean',
                'lastname' => 'Claude',
                'email' => 'jean.claude@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-04-20'),
                'quote' => 'Sed nisl mauris, congue a scelerisque in, suscipit quis diam. Mauris nec ultrices est. Sed tristique a nisl nec congue. Vestibulum finibus velit vitae massa volutpat super mega ADRAR Classrooms.',
                'emploi' => 'Acteur de cinéma belge',
                'profilePictureLink' => "imgs/profile_pictures/portrait-connexion5.png",
            ],
            [
                'username' => 'jjackson',
                'firstname' => 'Janette',
                'lastname' => 'Jackson',
                'email' => 'janette.jackson@exemple.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-04-20'),
                'quote' => "Peek in the shadow, I come into the light, If you tell me I'm wrong, Then you better prove you're right, And you're sellin' out souls, But I, I care about mine, I've got to get stronger, And I won't give up ADRAR Classrooms.",
                'emploi' => 'Chanteuse et danseuse américaine',
                'profilePictureLink' => "imgs/profile_pictures/portrait-connexion9.png",
            ],
            [
                'username' => 'pjones',
                'firstname' => 'Paul',
                'lastname' => 'Jones',
                'email' => 'paul.jones@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-05-10'),
                'quote' => 'Duis aute irure dolor in ADRAR Classrooms voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.',
                'emploi' => 'Développeur Full-Stack Junior',
                'profilePictureLink' => "imgs/profile_pictures/portrait-connexion2.png",
            ],
            [
                'username' => 'hpotter',
                'firstname' => 'Harry',
                'lastname' => 'Potter',
                'email' => 'harry.potter@example.com',
                'password' => 'password123',
                'createdAt' => new \DateTime('2023-06-15'),
                'quote' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit ADRAR Classrooms, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
                'emploi' => 'Sorcier Full-Stack Junior',
                'profilePictureLink' => "imgs/profile_pictures/portrait-connexion7.png",
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
                'profilePictureLink' => "imgs/profile_pictures/portrait-connexion8.png",
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
            $user->setProfilePictureLink($data['profilePictureLink']);
            $manager->persist($user);
            $this->addReference(self::USER_REFERENCE_TAG . $i, $user);
        }
        $manager->flush();
    }
}