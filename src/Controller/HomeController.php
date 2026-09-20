<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(StudentRepository $studentRepository, CourseRepository $courseRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'studentCount' => $studentRepository->count([]),
            'courseCount' => $courseRepository->count([]),
        ]);
    }
}