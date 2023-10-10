<?php

namespace App\DataFixtures;


use App\Entity\HeaderFooter;
use App\Entity\HomePage;
use App\Entity\Menu;
use App\Entity\Holiday;
use App\Entity\User;
use Carbon\Carbon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private ObjectManager $manager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;


        // Create admin user
        $adminUser = new User();
        $adminUser->setEmail('admin@efin.ru');
        $adminUser->setRoles(['ROLE_ADMIN']);

        $hashedPassword = $this->passwordHasher->hashPassword($adminUser, 'admin');
        $adminUser->setPassword($hashedPassword);
        $this->save($adminUser);

        // Create manager user
        $adminUser = new User();
        $adminUser->setEmail('manager@efin.ru');
        $adminUser->setRoles(['ROLE_MANAGER']);

        $hashedPassword = $this->passwordHasher->hashPassword($adminUser, 'admin');
        $adminUser->setPassword($hashedPassword);
        $this->save($adminUser);







    }


    public function save($object): void
    {
        $this->manager->persist($object);
        $this->manager->flush();
    }
}
