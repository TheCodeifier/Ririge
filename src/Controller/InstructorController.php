<?php

namespace App\Controller;

use App\Entity\Lesson;
use App\Entity\Person;
use App\Form\LessonType;
use App\Repository\LessonRepository;
use App\Repository\PersonRepository;
use App\Repository\TrainingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstructorController extends AbstractController
{
    #[Route('/instructor', name: 'instructor_overview')]
    public function overview(LessonRepository $lessonRepository)
    {
        $Lessons = $lessonRepository->findBy(
            ['instructor' =>5],['date'=>'asc']
        );
        return $this->render('instructor/overview.html.twig', [
            'lessons'=>$Lessons,
        ]);
    }

    #[Route('instructor/delete/lesson/{id}', name: 'deleteLesson')]
    public function delete(LessonRepository $lessonRepository, EntityManagerInterface $entityManager, int $id)
    {
        $lesson = $lessonRepository->find($id);
        $entityManager->remove($lesson);
        $entityManager->flush();
        $this->addFlash('danger', 'Item successfully deleted');
        return $this->redirectToRoute('instructor_overview');

    }

    #[Route('/instructor/lesson/add')]
    public function new(EntityManagerInterface $entityManager, Request $request): Response
    {
        $lesson = new Lesson();
        $form = $this->createForm(LessonType::class,$lesson);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $lesson = $form->getData();
            $lesson->setInstructor($entityManager->getRepository(Person::class)->find(5));
            $entityManager->persist($lesson);
            $entityManager->flush();
            $this->addFlash('success', 'Item successfully added');
            return $this->redirectToRoute('instructor_overview');
        }

        return $this->renderForm('instructor/newLesson.html.twig', [
            'form'=>$form,
        ]);
    }

    #[Route('/adminstration/update/{id}', name: 'lesson_update')]
    public function trainingUpdate(EntityManagerInterface $entityManager, Request $request, LessonRepository $lessonRepository, int $id)
    {
        $lesson = $lessonRepository->find($id);
        $form= $this->createForm(LessonType::class, $lesson);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $lesson= $form->getData();
            $entityManager->persist($lesson);
            $entityManager->flush();
            $this->addFlash('success', 'Item successfully updated');
            return $this->redirectToRoute('instructor_overview');
        }

        return $this->renderForm('instructor/newLesson.html.twig', [
            'form'=>$form,
        ]);
    }

}
