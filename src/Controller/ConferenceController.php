<?php

namespace App\Controller;

use App\Entity\Admin\Conference;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ConferenceController extends AbstractController
{
    public function index()
    {
        $conferences = $this->getDoctrine()
            ->getRepository(Conference::class)
            ->findAll();

        return $this->render('conference/index.html.twig', [
            'conferences' => $conferences
        ]);
    }
}
