<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminstrationController extends AbstractController
{
    #[Route('/adminstration', name: 'app_adminstration')]
    public function index(): Response
    {
        return $this->render('adminstration/index.html.twig', [
            'controller_name' => 'AdminstrationController',
        ]);
    }
}
