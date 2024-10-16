<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i < 21; $i++)
        {
            $course = new Course();
            $course->setDate($i.'/10/2024');
            $course->setHFin($i);
            $course->setHDebut(($i-1));
            $course->setNom('Course'.$i);
            $manager->persist($course);
        }

        $manager->flush();
    }
}
