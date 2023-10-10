<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextField::new('email')->setLabel('Email'),
            ArrayField::new('roles')->setLabel(' Роли'),
        ];

        if (Crud::PAGE_NEW === $pageName || Crud::PAGE_EDIT === $pageName) {
            $fields[] = TextField::new('plainPassword', 'Пароль')
                ->setFormType(PasswordType::class) // Используем PasswordType
                ->onlyOnForms()
                ->setRequired(Crud::PAGE_NEW === $pageName);
        }

        return $fields;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->encodePassword($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }

    private function encodePassword(User $user): void
    {
        if ($user->getPlainPassword() !== null) {
            $encodedPassword = $this->passwordHasher->hashPassword($user, $user->getPlainPassword());
            $user->setPassword($encodedPassword);
        }
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->setEntityPermission('ROLE_ADMIN') // Ограничение доступа только для ROLE_ADMIN
            ->setPageTitle(Crud::PAGE_INDEX, 'Пользователи')
            ->setPageTitle(Crud::PAGE_NEW, 'Create Manager')
            ->setPageTitle(Crud::PAGE_EDIT, 'Edit Manager')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Manager Details')

            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('пользователя')
            ->setEntityLabelInPlural('Пользователи')
            ->renderContentMaximized()
            ->setPageTitle('new', 'Создать нового пользователя')
            ;
    }
}
