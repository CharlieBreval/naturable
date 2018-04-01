<?php

namespace App\Controller;

use App\Entity\Admin\Editable;
use App\Entity\Admin\Therapy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TherapyController extends AbstractController
{
    public function preventive()
    {
        $therapies = $this->getDoctrine()
            ->getRepository(Therapy::class)
            ->findBy(['category' => 'preventive']);

        $intro = $this->getDoctrine()
            ->getRepository(Editable::class)
            ->findOneByAccessKey('preventive.intro');

        $title = $this->getDoctrine()
            ->getRepository(Editable::class)
            ->findOneByAccessKey('preventive.title');

        return $this->render('therapy/preventive.html.twig', [
            'therapies' => $therapies,
            'intro' => $intro,
            'title' => $title,
        ]);
    }

    public function complementary()
    {
        $therapies = $this->getDoctrine()
            ->getRepository(Therapy::class)
            ->findBy(['category' => 'complementary']);

        $intro = $this->getDoctrine()
            ->getRepository(Editable::class)
            ->findOneByAccessKey('complementary.intro');

        $title = $this->getDoctrine()
            ->getRepository(Editable::class)
            ->findOneByAccessKey('complementary.title');

        return $this->render('therapy/complementary.html.twig', [
            'therapies' => $therapies,
            'intro' => $intro,
            'title' => $title,
        ]);
    }

    public function show(Therapy $therapy)
    {
        return $this->render('therapy/show.html.twig', [
            'therapy' => $therapy
        ]);
    }
}
