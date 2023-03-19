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
        // $product = new Product();
        // $manager->persist($product);

        $reservation1 = new Reservation();
        $reservation1->addNom($manager->merge($this->getReference('user2')))
        ->setNbPlacesReservees(3)
        ->setTrajet($manager->merge($this->getReference('trajet1')));
        $manager->persist($reservation1);

        $reservation2 = new Reservation();
        $reservation2->addNom($manager->merge($this->getReference('user3')))
        ->setNbPlacesReservees(2)
        ->setTrajet($manager->merge($this->getReference('trajet2')));
        $manager->persist($reservation2);

        $reservation3 = new Reservation();
        $reservation3->addNom($manager->merge($this->getReference('user4')))
        ->setNbPlacesReservees(2)
        ->setTrajet($manager->merge($this->getReference('trajet2')));
        $manager->persist( $reservation3);

        $manager->flush();

        $this->addReference('reservation1', $reservation1);
        $this->addReference('reservation2', $reservation2);
        $this->addReference('reservation3', $reservation3);

    } 
    /**
    * @return array
    */
   public function getDependencies(): array
   {
       return [
           TrajetFixtures::class,
           UserFixtures::class,
       ];
   }
}
