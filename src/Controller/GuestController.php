<?php
namespace App\Controller;
use App\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Form\MemberRegistrationFormType;

class GuestController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('guest/index.html.twig', [
            'controller_name' => 'GuestController',
        ]);
    }

    #[Route('/', name: 'Home')]
    public function home(): Response
    {

        return $this->render('guest/g_home.html.twig');
    }

    #[Route('guest/account', name: 'Account')]
    public function account(): Response
    {

        return $this->render('guest/g_account.html.twig');
    }

    #[Route('guest/about_Us', name: 'About_Us')]
    public function aboutus(): Response
    {

        return $this->render('guest/g_aboutus.html.twig');
    }

    #[Route('/contact', name: 'Contact')]
    public function contact(): Response
    {

        return $this->render('g_contact.html.twig');
    }


    #[Route('/Instructor', name: 'Instructor')]
    public function instructor(): Response
    {

        return $this->render('guest/Guest_Instructor.html.twig');
    }

    #[Route('lesson', name: 'Lesson')]
    public function lesson(): Response
    {

        return $this->render('guest/g_lesson.html.twig');
    }

    #[Route('/lessons', name: 'Lessons')]
    public function lessons(): Response
    {

        return $this->render('guest/g_lessons.html.twig');
    }

    #[Route('/Register', name: 'Register')]
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response {

        $person = new Person();

        $regForm = $this->createForm(MemberRegistrationFormType::class, $person);
        $regForm->handleRequest($request);

        if ($regForm->isSubmitted() && $regForm->isValid()) {
            $person->setPassword($userPasswordHasher->hashPassword($person, $regForm->get('plainPassword')->getData()));
            $entityManager->persist($regForm);
            $entityManager->flush();
            return $this->redirectToRoute('Account');
        }

        return $this->render('guest/g_register.html.twig', ['form' => $regForm]);
    }

    #[Route('/Login', name: 'Login')]
    public function login(): Response
    {

        return $this->render('guest/g_login.html.twig');
    }

    #[Route('/Member', name: 'Member')]
    public function member(): Response
    {

        return $this->render('guest/member.html.twig');
    }
}

