<?php

namespace App\Controller;

use App\Entity\Training;
use App\Form\TrainingType;
use App\Repository\LessonRepository;
use App\Repository\PersonRepository;
use App\Repository\TrainingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminstrationController extends AbstractController
{
    #[Route('/adminstration', name: 'app_adminstration')]
    public function index(PersonRepository $personRepository): Response
    {
        $persons = $personRepository->findAll();
        return $this->render('adminstration/overview.html.twig', [
            'controller_name' => 'AdminstrationController',
            'persons'=>$persons,
            'title'=>'Leden',
            'link1'=>' active',
            'link2'=>'',
            'link3'=>'',
        ]);
    }

    #[Route('/adminstration/instructor', name: 'app_adminstration_instructor')]
    public function instructor(PersonRepository $personRepository): Response
    {
        $persons = $personRepository->findBy([
            'role'=>'["ROLE_INSTRUCTOR"]',
        ]);
        return $this->render('adminstration/overview.html.twig', [
            'controller_name' => 'AdminstrationController',
            'persons'=>$persons,
            'title'=>'Instructors',
            'link2'=>' active',
            'link1'=>'',
            'link3'=>'',

        ]);
    }

    #[Route('/adminstration/training', name: 'app_adminstration_training')]
    public function lesson(TrainingRepository $trainingRepository): Response
    {
        $trainings = $trainingRepository->findAll();
        return $this->render('adminstration/training.html.twig', [
            'controller_name' => 'AdminstrationController',
            'trainings'=>$trainings,
            'title'=>'Trainings',
            'link1'=>'',
            'link2'=>'',
            'link3'=>' active',
        ]);
    }

    #[Route('adminstration/delete/person/{id}', name: 'deletePerson')]
    public function delete(PersonRepository $personRepository, EntityManagerInterface $entityManager, int $id)
    {
        $person = $personRepository->find($id);
        $entityManager->remove($person);
        $entityManager->flush();
        $this->addFlash('danger', 'Item successfully deleted');
        return $this->redirectToRoute('app_adminstration');

    }

    #[Route('adminstration/delete/training/{id}', name: 'delete')]
    public function deleteTraining(TrainingRepository $trainingRepository, EntityManagerInterface $entityManager, int $id)
    {
        $training = $trainingRepository->find($id);
        $entityManager->remove($training);
        $entityManager->flush();
        $this->addFlash('danger', 'Item successfully deleted');
        return $this->redirectToRoute('app_adminstration_training');

    }

    #[Route('/adminstration/training/add')]
    public function newTraining(EntityManagerInterface $entityManager, Request $request): Response
    {
        $training = new Training();
        $form = $this->createForm(TrainingType::class,$training);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $training = $form->getData();
            $entityManager->persist($training);
            $entityManager->flush();
            $this->addFlash('success', 'Item successfully added');
            return $this->redirectToRoute('app_adminstration_training');
        }

        return $this->renderForm('adminstration/trainingAdd.html.twig', [
            'form'=>$form,
        ]);
    }

}
