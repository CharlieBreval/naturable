<?php

namespace App\Controller;

use App\Entity\Admin\News;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends AbstractController
{
    public function index()
    {
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->findAll();

        return $this->render('news/index.html.twig', [
            'news' => $news
        ]);
    }

    public function show(News $news)
    {
        return $this->render('news/show.html.twig', [
            'news' => $news
        ]);
    }
}
