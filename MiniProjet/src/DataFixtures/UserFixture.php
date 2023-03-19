<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixture extends Fixture
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
        $user1->setNom('MERLET')
        ->setPrenom('Cédric')
        ->setEmail('cedricmerlet@gmail.com')
        ->setTel('0320456955');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setNom('TANCRAY')
        ->setPrenom('Manon')
        ->setEmail('manontancray@gmail.com')
        ->setTel('2396564865');
        $manager->persist($user2);

        $user3 = new User();
        $user3->setNom('MIROIT')
        ->setPrenom('Robert')
        ->setEmail('robertmiroit@gmail.com')
        ->setTel('0956478522');
        $manager->persist($user3);

        $user4 = new User();
        $user4->setNom('COUET')
        ->setPrenom('Patricia')
        ->setEmail('patriciatcouet@gmail.com')
        ->setTel('3265985645');
        $manager->persist($user4);

        $user5 = new User();
        $user5->setNom('CARDE')
        ->setPrenom('Paulette')
        ->setEmail('paulettecarde@gmail.com')
        ->setTel('1323654899');
        $manager->persist($user5);

        $manager->flush();

        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
        $this->addReference('user3', $user3);
        $this->addReference('user4', $user4);
        $this->addReference('user5', $user5);
    }
}
