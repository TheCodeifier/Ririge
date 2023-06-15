<?php

namespace App\Controller;

use App\Repository\LessonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MemberController extends AbstractController
{
    #[Route('/member/account', name: 'Account')]
    public function account(EntityManagerInterface $entityManager, int $id, Request $request): Response
    {
        $person = $entityManager->getRepository(Person::class)->find($id);

        $form = $this->createForm(RegisterType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();
        }

        return $this->render('member/account.html.twig', ['controller_name' => 'MemberController']);
    }

    #[Route('/member/lesson', name: 'member_Lesson')]
    public function lesson(LessonRepository $lessonRepository): Response
    {
        $lessons=$lessonRepository->findAll();
        return $this->render('member/lesson.html.twig', [
            'lessons'=>$lessons,
        ]);
    }


}
