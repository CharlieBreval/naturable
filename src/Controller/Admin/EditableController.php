<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Editable;
use App\Form\Admin\EditableType;
use App\Repository\EditableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/editable")
 */
class EditableController extends Controller
{
    /**
     * @Route("/", name="admin_editable_index", methods="GET")
     */
    public function index(EditableRepository $editableRepository): Response
    {
        return $this->render('admin/editable/index.html.twig', ['editables' => $editableRepository->findAll()]);
    }

    /**
     * @Route("/new", name="admin_editable_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $editable = new Editable();
        $form = $this->createForm(EditableType::class, $editable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($editable);
            $em->flush();

            return $this->redirectToRoute('admin_editable_index');
        }

        return $this->render('admin/editable/new.html.twig', [
            'editable' => $editable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_editable_show", methods="GET")
     */
    public function show(Editable $editable): Response
    {
        return $this->render('admin/editable/show.html.twig', ['editable' => $editable]);
    }

    /**
     * @Route("/{id}/edit", name="admin_editable_edit", methods="GET|POST")
     */
    public function edit(Request $request, Editable $editable): Response
    {
        $form = $this->createForm(EditableType::class, $editable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_editable_edit', ['id' => $editable->getId()]);
        }

        return $this->render('admin/editable/edit.html.twig', [
            'editable' => $editable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_editable_delete", methods="DELETE")
     */
    public function delete(Request $request, Editable $editable): Response
    {
        if ($this->isCsrfTokenValid('delete'.$editable->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($editable);
            $em->flush();
        }

        return $this->redirectToRoute('admin_editable_index');
    }
}
