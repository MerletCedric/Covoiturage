<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReservationFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $reservation1 = new Reservation();
        $reservation1->setNbPlacesReservees(2)
        ->setTrajet($this->getReference('trajet1'))
        ->addNom($this->getReference('user1'));
        $manager->persist($reservation1);

        $reservation2 = new Reservation();
        $reservation2->setNbPlacesReservees(1)
        ->setTrajet($this->getReference('trajet2'))
        ->addNom($this->getReference('user3'));
        $manager->persist($reservation2);

        $reservation3 = new Reservation();
        $reservation3->setNbPlacesReservees(4)
        ->setTrajet($this->getReference('trajet3'))
        ->addNom($this->getReference('user2'));
        $manager->persist( $reservation3);

        $manager->flush();

        $this->addReference('reservation1', $reservation1);
        $this->addReference('reservation2', $reservation2);
        $this->addReference('reservation3', $reservation3);

    } 
    
    public function getDependencies()
    {
        return [
            TrajetFixture::class,
            UserFixture::class,
        ];
    }
}
