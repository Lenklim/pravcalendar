<?php

namespace App\Controller\Admin;

use App\Entity\HeaderFooter;
use App\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HeaderFooterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HeaderFooter::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('logo')->setLabel('Логотип')
                ->setBasePath('/images/pages')
                ->setUploadDir('/public/images/pages')
                ->setHelp('Only .png and .jpg'),
            ImageField::new('imageForm')->setLabel('Изображение главной формы')
                ->setBasePath('/images/pages')
                ->setUploadDir('/public/images/pages')
                ->setHelp('Only .png and .jpg'),
            TextField::new('copyright')->setLabel('Текст копирайта'),
            TextEditorField::new('textCenter')->setLabel('Текст по центру')->hideOnIndex(),
            TextField::new('policyTitle')->setLabel('Название политики')->hideOnIndex(),
            TextField::new('policyLink')->setLabel('Ссылка на политику')->hideOnIndex(),
            TextField::new('email')->setLabel('Email'),
            TextField::new('Phone')->setLabel('Телефон'),
            TextEditorField::new('privacyPolicy')->setLabel('Политика обработки персональных данных')->hideOnIndex(),
            AssociationField::new( 'menu')->setCrudController( MenuCrudController::class)
                ->setColumns(3)->setLabel('Пункты меню'),

            TextField::new('pageListSeoTitle')->setLabel('СЕО Тайтл карьерные медиа - список')->hideOnIndex(),
            TextField::new('pageListSeoKeywords')->setLabel('СЕО ключевые слова (keywords) карьерные медиа - список')->hideOnIndex(),
            TextField::new('pageListSeoDescription')->setLabel('СЕО Description карьерные медиа - список')->hideOnIndex(),
            TextField::new('vacancyListSeoTitle')->setLabel('СЕО Тайтл вакансии - список')->hideOnIndex(),
            TextField::new('vacancyListSeoKeywords')->setLabel('СЕО ключевые слова (keywords) вакансии - список')->hideOnIndex(),
            TextField::new('vacancyListSeoDescription')->setLabel('СЕО Description вакансии - список')->hideOnIndex(),

        ];
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Header, Footer, Settings')
            ->setEntityLabelInPlural('Header, Footer, Settings')
            ->renderContentMaximized()
            ->showEntityActionsInlined()
            ;
    }


}
