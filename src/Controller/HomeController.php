<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $toLogin = $this->generateUrl('app_login');
        $toRegister = $this->generateUrl('app_register');
        // $toForgot = $this->generateUrl('app_forgot_password');
        $appName = 'Test-Firma';
        return $this->render('home/index.html.twig', [
            'appName' => $appName,
            'toLogin' => $toLogin,
            'toRegister' => $toRegister,
        ]);
    }
}
