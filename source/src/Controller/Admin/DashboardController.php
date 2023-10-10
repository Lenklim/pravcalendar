<?php

namespace App\Controller\Admin;

use App\Entity\HomePage;
use App\Entity\HeaderFooter;
use App\Entity\Holiday;
use App\Entity\Page;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
    }
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Административная панель');

    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud(' Главная', 'fa-solid fa-house', HomePage::class);
        yield MenuItem::linkToCrud(' Праздник', 'fa-solid fa-calendar-check', Holiday::class);
        yield MenuItem::linkToCrud(' Страница', 'fa-regular fa-file-lines', Page::class);
        yield MenuItem::linkToCrud(' Хеадер и футер', 'fa-regular fa-paste', HeaderFooter::class);
        yield MenuItem::linkToCrud(' Пользователи', 'fa-solid fa-users', User::class);

    }
}
