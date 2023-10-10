<?php

namespace App\Controller\Admin;

use App\Entity\HomePage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;


class HomePageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomePage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title')->setColumns(7)->setLabel('Заголовок'),
            TextField::new('description')->setColumns(7)->setLabel('Описание'),
            TextField::new('titlePage')->setLabel('Главный заголовок')->hideOnIndex()->setColumns(7),
            ImageField::new('imageDate')->setColumns(7)->setLabel(' Дата')
                ->setBasePath('/images/pages')
                ->setUploadDir('/public/images/pages')
                ->setHelp('Only .png and .jpg'),
            ImageField::new('imageCalendar')->setColumns(7)->setLabel(' Календарь')
                ->setBasePath('/images/pages')
                ->setUploadDir('/public/images/pages')
                ->setHelp('Only .png and .jpg'),
            TextField::new('titleAbout')->setLabel('Заголовок О компании')->setColumns(7),
            TextEditorField::new('fullText')->setLabel('Полный текст')->hideOnIndex(),
            TextField::new('seoTitle')->setColumns(7)->setLabel('Seo  Заголовок')->setColumns(7),
            TextField::new('seoDescription')->setColumns(7)->setLabel(' Seo  описание'),
            TextField::new('seoKeywords')->setColumns(7)->setLabel(' Seo  ключевые слова')->hideOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('главную')
            ->setEntityLabelInPlural('Главная')
            ->renderContentMaximized()
            ->showEntityActionsInlined()
    ;
    }

 //   public function configureActions(Actions $actions): Actions
  //  {
 //       return $actions
 //           ->disable(Action::NEW)
//            ->disable(Action::DELETE);
  //  }

}








