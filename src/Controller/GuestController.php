<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuestController extends AbstractController {

    public function index(): Response {
        return $this->render('guest/index.html.twig', [
            'controller_name' => 'GuestController',
        ]);
    }

    #[Route('/Training_Factory/Account', name: 'Account')]
    public function account(): Response {

        return $this->render('guest/Guest_Account.html.twig');
    }

    #[Route('/Training_Factory/About_Us', name: 'About_Us')]
    public function aboutus(): Response {

        return $this->render('guest/Guest_About_Us.html.twig');
    }

    #[Route('/Training_Factory/Contact', name: 'Contact')]
    public function contact(): Response {

        return $this->render('guest/Guest_Contact.html.twig');
    }

    #[Route('/Training_Factory/Home', name: 'Home')]
    public function home(): Response {

        return $this->render('guest/Guest_Home.html.twig');
    }

    #[Route('/Training_Factory/Instructor', name: 'Instructor')]
    public function instructor(): Response {

        return $this->render('guest/Guest_Instructor.html.twig');
    }

    #[Route('/Training_Factory/Lesson', name: 'Lesson')]
    public function lesson(): Response {

        return $this->render('guest/Guest_Lesson.html.twig');
    }

    #[Route('/Training_Factory/Lessons', name: 'Lessons')]
    public function lessons(): Response {

        return $this->render('guest/Guest_Lessons.html.twig');
    }

    #[Route('/Training_Factory/Login', name: 'Login')]
    public function login(): Response {

        return $this->render('guest/Guest_Login.html.twig');
    }

    #[Route('/Training_Factory/Member', name: 'Member')]
    public function member(): Response {

        return $this->render('guest/Guest_Member.html.twig');
    }

    #[Route('/Training_Factory/Register', name: 'Register')]
    public function register(): Response {

        return $this->render('guest/Guest_Register.html.twig');
    }
}
