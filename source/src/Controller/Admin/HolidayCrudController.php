<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use App\Entity\Holiday;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;


class HolidayCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Holiday::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('title')->setColumns(7)->setLabel('Заголовок'),
            TextField::new('name')->setColumns(7)->setLabel('Название'),
            TextEditorField::new('description')->setColumns(7)->setLabel('Описание'),
            TextField::new('shortText')->setColumns(7)->setLabel('Короткий текст'),
            TextField::new('post')->setColumns(7)->setLabel('Пост'),
            DateField::new('date')->setColumns(7)->setLabel('Дата'),

            TextField::new('buttonLink')->setColumns(7)->setLabel('С'),

            ArrayField::new('links')->setColumns(7)->setLabel('Ссылки'),


            TextField::new('slug')->setColumns(7)->setLabel('Slug'),



            SlugField::new('slug')->setTargetFieldName('name')->setColumns(7)->setLabel(' slug'),
 //           AssociationField::new('image')->setCrudController(BannerHolidayCrudController::class)
 //               ->setColumns(3)->setLabel('Картинка')->hideOnIndex(),
            ImageField::new('image')->setLabel('Картинка')->setColumns(7)
                ->setBasePath('/images/pages')
                ->setUploadDir('/public/images/pages')
                ->setHelp('Only .png and .jpg'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('праздник')
            ->setEntityLabelInPlural('Праздник')
            ->renderContentMaximized()
            ->showEntityActionsInlined()
            ->setSearchFields([ 'name'])
            ;
    }
}


