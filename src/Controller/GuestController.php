<?php
namespace App\Controller;
use App\Entity\Person;
use App\Form\LoginType;
use App\Form\MemberRegistrationForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Form\MemberRegistrationFormType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class GuestController extends AbstractController
{
    #[Route('/guest', name: 'app_guest')]
    public function index(): Response
    {
        return $this->render('guest/Login.html.twig', [
            'controller_name' => 'GuestController',
        ]);
    }

    #[Route('/Account', name: 'Account')]
    public function account(): Response
    {

        return $this->render('guest/Guest_Account.html.twig');
    }

    #[Route('/About_Us', name: 'About_Us')]
    public function aboutus(): Response
    {

        return $this->render('guest/Guest_About_Us.html.twig');
    }

    #[Route('/Contact', name: 'Contact')]
    public function contact(): Response
    {

        return $this->render('guest/Guest_Contact.html.twig');
    }

    #[Route('/Home', name: 'Home')]
    public function home(): Response
    {

        return $this->render('guest/Guest_Home.html.twig');
    }

    #[Route('/Instructor', name: 'Instructor')]
    public function instructor(): Response
    {

        return $this->render('guest/Guest_Instructor.html.twig');
    }

    #[Route('/Lesson', name: 'Lesson')]
    public function lesson(): Response
    {

        return $this->render('guest/Guest_Lesson.html.twig');
    }

    #[Route('/Lessons', name: 'Lessons')]
    public function lessons(): Response
    {


        return $this->render('guest/g_lessons.html.twig');
    }

    #[Route('/Register', name: 'Register')]
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {

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
    public function login(AuthenticatorUtils $authenticatorUtils, Request $request): Response {

     $login = new LoginType();
     $logForm = $this->createForm(LoginType::class, $login;
      $logForm->handleRequest($request);

        $error = $authenticatorUtils->getLastAuthenticationError();
        $lastUsername = $authenticatorUtils->getLastUsername();

        return $this->render('guest/Guest_Login.html.twig', ['controller_name' => 'LoginController', 'last_username' => $lastUsername, 'error' => $error, 'form' => $logForm]);
    }

    #[Route('/Member', name: 'Member')]
    public function member(): Response
    {


        return $this->render('guest/Guest_Member.html.twig');
    }
}


