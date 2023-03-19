<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixture extends Fixture implements DependentFixtureInterface
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

        $user1 = new User();
        $user1->setNom('Cédric')
        ->setPrenom('Merlet')
        ->setEmail('cedricmerlet@gmail.com')
        ->setTel('0320456955')
        ->addReservation($manager->merge($this->getReference('reservation1')));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setNom('Manon')
        ->setPrenom('Tancray')
        ->setEmail('manontancray@gmail.com')
        ->setTel('2396564865')
        ->addReservation($manager->merge($this->getReference('reservation1')));
        $manager->persist($user2);

        $user3 = new User();
        $user3->setNom('Robert')
        ->setPrenom('Miroit')
        ->setEmail('robertmiroit@gmail.com')
        ->setTel('0956478522')
        ->addReservation($manager->merge($this->getReference('reservation2')));
        $manager->persist($user3);

        $user4 = new User();
        $user4->setNom('Patricia')
        ->setPrenom('couet')
        ->setEmail('patriciatcouet@gmail.com')
        ->setTel('3265985645')
        ->addReservation($manager->merge($this->getReference('reservation2')));
        $manager->persist($user4);

        $user5 = new User();
        $user5->setNom('Paulette')
        ->setPrenom('Carde')
        ->setEmail('paulettecarde@gmail.com')
        ->setTel('1323654899')
        ->addReservation($manager->merge($this->getReference('reservation2')));
        $manager->persist($user5);

        $manager->flush();

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
        $this->addReference('user4', $user4);
        $this->addReference('user5', $user5);
    }
     /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            ReservationFixtures::class,
        ];
    }
}
