<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EmployeesController extends AbstractController
{
    #[Route('/employees', name: 'app_employees')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_EMPLOYEE');
        $user = $this->getUser();
        return $this->render('employees/index.html.twig', [
            'user' => $user,
        ]);
    }
}
