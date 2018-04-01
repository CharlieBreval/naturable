<?php

namespace App\Controller;

use App\Entity\Admin\Editable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends AbstractController
{
    public function index()
    {
        $title = $this->getDoctrine()
            ->getRepository(Editable::class)
            ->findOneByAccessKey('about.title');

        $description = $this->getDoctrine()
            ->getRepository(Editable::class)
            ->findOneByAccessKey('about.description');

        return $this->render('about/index.html.twig', [
            'title' => $title,
            'description' => $description
        ]);
    }
}
