<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Trajet;

class TrajetFixture extends Fixture implements DependentFixtureInterface
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

        $trajet1 = new Trajet();
        $trajet1->setVilleDepart($manager->merge($this->getReference('ville1')))
        ->setVilleArrivee($manager->merge($this->getReference('ville6')))
        ->setConducteur($manager->merge($this->getReference('user1')))
        ->addPassager($manager->merge($this->getReference('user2')))
        ->setDateDepart(new \DateTime('28-11-2003'))
        ->setNbPlacesRestants(2)
        ->setModeleVoiture('Clio campus 2')
        ->setHeureDepart(new \DateTime('15:23'))
        ->setReservation($manager->merge($this->getReference('reservation1')));
        $manager->persist($trajet1);

        $trajet2 = new Trajet();
        $trajet2->setVilleDepart($manager->merge($this->getReference('ville5')))
        ->setVilleArrivee($manager->merge($this->getReference('ville3')))
        ->setConducteur($manager->merge($this->getReference('user4')))
        ->addPassager($manager->merge($this->getReference('user5')))
        ->addPassager($manager->merge($this->getReference('user3')))
        ->setDateDepart(new \DateTime('02-06-2020'))
        ->setNbPlacesRestants(0)
        ->setModeleVoiture('Bugatti Veyron 16.4')
        ->setHeureDepart(new \DateTime('02:00'))
        ->setReservation($manager->merge($this->getReference('reservation2')))
        ->setReservation($manager->merge($this->getReference('reservation3')));
        $manager->persist($trajet2);

        $manager->flush();

        $this->addReference('trajet1', $trajet1);
        $this->addReference('trajet2', $trajet2);
    }
     /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            VilleFixtures::class,
            UserFixtures::class,
            ReservationFixtures::class,
        ];
    }
}
