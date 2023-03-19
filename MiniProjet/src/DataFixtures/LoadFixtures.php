<?php
// src/DataFixtures/LoadFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->loadFixtures([
            UserFixture::class,
            VilleFixture::class,
            ReservationFixture::class,
            TrajetFixture::class, // add TrajetFixture to the list of fixtures
        ]);
    }
}
