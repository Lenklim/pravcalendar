<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('description')->setColumns(7)->setLabel('Описание'),
            TextField::new('name')->setColumns(7)->setLabel('Название'),
            TextField::new('title')->setColumns(7)->setLabel('Заголовок'),
                        ImageField::new('image')->setLabel('Картинка')->setColumns(7)
                            ->setBasePath('/images/pages')
                            ->setUploadDir('/public/images/pages')
                            ->setHelp('Only .png and .jpg')
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('страницу')
            ->setEntityLabelInPlural('Страница')
            ->renderContentMaximized()
            ->showEntityActionsInlined()
            ->setSearchFields([ 'name'])
            ;
    }
}
