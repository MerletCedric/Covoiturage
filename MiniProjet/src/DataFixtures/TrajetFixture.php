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
        $trajet1 = new Trajet();
        $trajet1->setVilleDepart($manager->merge($this->getReference('ville1')))
        ->setVilleArrivee($manager->merge($this->getReference('ville6')))
        ->setConducteur($manager->merge($this->getReference('user1')))
        ->setDateDepart(new \DateTime('28-11-2003'))
        ->setNbPlacesRestants(2)
        ->setModeleVoiture('Clio campus 2')
        ->setHeureDepart(new \DateTime('15:23'));
        $manager->persist($trajet1);

        $trajet2 = new Trajet();
        $trajet2->setVilleDepart($manager->merge($this->getReference('ville5')))
        ->setVilleArrivee($manager->merge($this->getReference('ville3')))
        ->setConducteur($manager->merge($this->getReference('user4')))
        ->setDateDepart(new \DateTime('02-06-2020'))
        ->setNbPlacesRestants(0)
        ->setModeleVoiture('Bugatti Veyron 16.4')
        ->setHeureDepart(new \DateTime('02:00'));
        $manager->persist($trajet2);

        $trajet3 = new Trajet();
        $trajet3->setVilleDepart($manager->merge($this->getReference('ville2')))
        ->setVilleArrivee($manager->merge($this->getReference('ville1')))
        ->setConducteur($manager->merge($this->getReference('user1')))
        ->setDateDepart(new \DateTime('02-06-2020'))
        ->setNbPlacesRestants(0)
        ->setModeleVoiture('2021 Tesla Model 3')
        ->setHeureDepart(new \DateTime('02:00'));
        $manager->persist($trajet3);

        $manager->flush();

        $this->addReference('trajet1', $trajet1);
        $this->addReference('trajet2', $trajet2);
        $this->addReference('trajet3', $trajet3);
    }
     /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            VilleFixture::class,
            UserFixture::class,
        ];
    }
}
