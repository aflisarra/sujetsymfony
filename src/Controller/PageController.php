<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('interface/base.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('interface/Contact.html.twig');
    }
    
    #[Route('/ind', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('interface/index.html.twig');
    }
    #[Route('/pricing', name: 'app_pricing')]
    public function pricing(): Response
    {
        return $this->render('interface/pricing.html.twig');
    }

    #[Route('/work', name: 'app_work')]
    public function work(): Response
    {
        return $this->render('interface/work.html.twig');
    }

    #[Route('/worksingle', name: 'app_worksingle')]
    public function singlew(): Response
    {
        return $this->render('interface/work-single.html.twig');
    }
    ////////////////////////////////////////////////////////////////////

    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('dashboard/dashboard.html.twig');
    }

    #[Route('/404', name: 'app_404')]
    public function erreur(): Response
    {
        return $this->render('dashboard/404.html.twig');
    }
    #[Route('/blank', name: 'app_blank')]
    public function blank(): Response
    {
        return $this->render('dashboard/blank.html.twig');
    }

    #[Route('/buttons', name: 'app_button')]
    public function buttons(): Response
    {
        return $this->render('dashboard/buttons.html.twig');
    }

    #[Route('/cards', name: 'app_cards')]
    public function cards(): Response
    {
        return $this->render('dashboard/cards.html.twig');
    }

    #[Route('/charts', name: 'app_charts')]
    public function charts(): Response
    {
        return $this->render('dashboard/charts.html.twig');
    }
    #[Route('/forgot', name: 'app_forgot')]
    public function forgot(): Response
    {
        return $this->render('dashboard/forgot-password.html.twig');
    }
    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('dashboard/login.html.twig');
    }
    #[Route('/register', name: 'app_register')]
    public function register(): Response
    {
        return $this->render('dashboard/register.html.twig');
    }

    #[Route('/table', name: 'app_table')]
    public function tables(): Response
    {
        return $this->render('dashboard/table.html.twig');
    }
    #[Route('/utilitesborder', name: 'app_utilborder')]
    public function borderr(): Response
    {
        return $this->render('dashboard/utilites-border.html.twig');
    }

    #[Route('/utilitescolor', name: 'app_utilcolor')]
    public function colorr(): Response
    {
        return $this->render('dashboard/utilites-color.html.twig');
    }
    #[Route('/utilitesother', name: 'app_utilother')]
    public function otherr(): Response
    {
        return $this->render('dashboard/utilites-other.html.twig');
    }
    #[Route('/utilitesanimation', name: 'app_utilanimation')]
    public function animation(): Response
    {
        return $this->render('dashboard/utilites-animation.html.twig');
    }

}