<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin/{route}', requirements: ['route' => '.*'], name: 'app_admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $user = $this->getUser();
        return $this->render('admin/index.html.twig', [
            'user' => $user,
        ]);
    }
}
