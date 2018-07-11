<?php

namespace App\Controller\Admin;

use App\Entity\Admin\News;
use App\Form\Admin\NewsType;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/news")
 */
class NewsController extends Controller
{
    /**
     * @Route("/", name="admin_news_index", methods="GET")
     */
    public function index(NewsRepository $newsRepository): Response
    {
        return $this->render('admin/news/index.html.twig', ['news' => $newsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="admin_news_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $imgFolder = $this->get('kernel')->getRootDir() . '/../public/img/news';

        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Save file banner
            $imageFile = $form->get('image')->getData();
            if (null !== $imageFile) {
                $status = move_uploaded_file($imageFile->getpathName(), $imgFolder.'/'.$imageFile->getClientOriginalName());
                if ($status === true) {
                    $news->setImage($imageFile->getClientOriginalName());
                }
            }

            // Save file banner
            $imageFile = $form->get('bigImage')->getData();
            if (null !== $imageFile) {
                $status = move_uploaded_file($imageFile->getpathName(), $imgFolder.'/'.$imageFile->getClientOriginalName());
                if ($status === true) {
                    $news->setBigImage($imageFile->getClientOriginalName());
                }
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            return $this->redirectToRoute('admin_news_index');
        }

        return $this->render('admin/news/new.html.twig', [
            'news' => $news,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_news_show", methods="GET")
     */
    public function show(News $news): Response
    {
        return $this->render('admin/news/show.html.twig', ['news' => $news]);
    }

    /**
     * @Route("/{id}/edit", name="admin_news_edit", methods="GET|POST")
     */
    public function edit(Request $request, News $news): Response
    {
        $imgFolder = $this->get('kernel')->getRootDir() . '/../public/img/news';

        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Save file banner
            $imageFile = $form->get('image')->getData();
            if (null !== $imageFile) {
                $status = move_uploaded_file($imageFile->getpathName(), $imgFolder.'/'.$imageFile->getClientOriginalName());
                if ($status === true) {
                    $news->setImage($imageFile->getClientOriginalName());
                }
            }

            // Save file banner
            $imageFile = $form->get('bigImage')->getData();
            if (null !== $imageFile) {
                $status = move_uploaded_file($imageFile->getpathName(), $imgFolder.'/'.$imageFile->getClientOriginalName());
                if ($status === true) {
                    $news->setBigImage($imageFile->getClientOriginalName());
                }
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_news_edit', ['id' => $news->getId()]);
        }

        return $this->render('admin/news/edit.html.twig', [
            'news' => $news,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_news_delete", methods="DELETE")
     */
    public function delete(Request $request, News $news): Response
    {
        if ($this->isCsrfTokenValid('delete'.$news->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($news);
            $em->flush();
        }

        return $this->redirectToRoute('admin_news_index');
    }
}
