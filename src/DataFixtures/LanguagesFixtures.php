<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Languages;

class LanguagesFixtures extends Fixture
{
    public const LANGUAGES_REFERENCE_TAG = 'languages-';
    public function load(ObjectManager $manager): void
    {

        $languageData = [
            [
                'title' => 'PHP',
                'img' => 'php.png'
            ],
            [
                'title' => 'Symfony',
                'img' => 'symfony.png'
            ],
            [
                'title' => 'Python',
                'img' => 'python.png'
            ],
            [
                'title' => 'Java',
                'img' => 'java.png'
            ],
            [
                'title' => 'JavaScript',
                'img' => 'javascript.png'
            ],
            [
                'title' => 'C++',
                'img' => 'c++.png'
            ],
            [
                'title' => 'C#',
                'img' => 'c#.png'
            ],
            [
                'title' => 'Ruby',
                'img' => 'ruby.png'
            ],
            [
                'title' => 'Go',
                'img' => 'go.png'
            ],
            [
                'title' => 'Swift',
                'img' => 'swift.png'
            ]
        ];

        foreach ($languageData as $i => $data) {
            $languages = new languages();
            $languages->settitle($data['title']);
            $languages->setImg($data['img']);


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
