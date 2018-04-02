<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Conference;
use App\Form\Admin\ConferenceType;
use App\Repository\ConferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/conference")
 */
class ConferenceController extends Controller
{
    /**
     * @Route("/", name="admin_conference_index", methods="GET")
     */
    public function index(ConferenceRepository $conferenceRepository): Response
    {
        return $this->render('admin/conference/index.html.twig', ['conferences' => $conferenceRepository->findAll()]);
    }

    /**
     * @Route("/new", name="admin_conference_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $conference = new Conference();
        $form = $this->createForm(ConferenceType::class, $conference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conference);
            $em->flush();

            return $this->redirectToRoute('admin_conference_index');
        }

        return $this->render('admin/conference/new.html.twig', [
            'conference' => $conference,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_conference_show", methods="GET")
     */
    public function show(Conference $conference): Response
    {
        return $this->render('admin/conference/show.html.twig', ['conference' => $conference]);
    }

    /**
     * @Route("/{id}/edit", name="admin_conference_edit", methods="GET|POST")
     */
    public function edit(Request $request, Conference $conference): Response
    {
        $form = $this->createForm(ConferenceType::class, $conference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_conference_edit', ['id' => $conference->getId()]);
        }

        return $this->render('admin/conference/edit.html.twig', [
            'conference' => $conference,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_conference_delete", methods="DELETE")
     */
    public function delete(Request $request, Conference $conference): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conference->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($conference);
            $em->flush();
        }

        return $this->redirectToRoute('admin_conference_index');
    }
}
