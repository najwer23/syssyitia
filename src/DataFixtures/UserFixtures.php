<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $encoded = $this->encoder->encodePassword($admin, 'admin');
        $admin->setPassword($encoded);
        $admin->setUsername('admin');
        $admin->setEmail('admin@gmail.com');
        $admin->setIsActive('0');
    

        $user = new User();
        $encoded = $this->encoder->encodePassword($user, 'byk');
        $user->setPassword($encoded);
        $user->setUsername('byk');
        $user->setEmail('admin@haha.com');
        $user->setIsActive('1');
      

        $manager->persist($user);
        $manager->persist($admin);
        $manager->flush();
    }
}
