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
      
        return $this->render('employees/index.html.twig');
    }
}
