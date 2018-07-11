<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Therapy;
use App\Form\Admin\TherapyType;
use App\Repository\TherapyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/therapy")
 */
class TherapyController extends Controller
{
    /**
     * @Route("/", name="admin_therapy_index", methods="GET")
     */
    public function index(TherapyRepository $therapyRepository): Response
    {
        return $this->render('admin/therapy/index.html.twig', ['therapies' => $therapyRepository->findAll()]);
    }

    /**
     * @Route("/new", name="admin_therapy_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $imgFolder = $this->get('kernel')->getRootDir() . '/../public/img/therapies';

        $therapy = new Therapy();
        $form = $this->createForm(TherapyType::class, $therapy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // Save file
            $imageFile = $form->get('image')->getData();
            if (null !== $imageFile) {
                $status = move_uploaded_file($imageFile->getpathName(), $imgFolder.'/'.$imageFile->getClientOriginalName());
                if ($status === true) {
                    $therapy->setImage($imageFile->getClientOriginalName());
                }
            }

            // Save file banner
            $imageFile = $form->get('banner')->getData();
            if (null !== $imageFile) {
                $status = move_uploaded_file($imageFile->getpathName(), $imgFolder.'/'.$imageFile->getClientOriginalName());
                if ($status === true) {
                    $therapy->setBanner($imageFile->getClientOriginalName());
                }
            }


            $em->persist($therapy);
            $em->flush();

            return $this->redirectToRoute('admin_therapy_index');
        }

        return $this->render('admin/therapy/new.html.twig', [
            'therapy' => $therapy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_therapy_show", methods="GET")
     */
    public function show(Therapy $therapy): Response
    {
        return $this->render('admin/therapy/show.html.twig', ['therapy' => $therapy]);
    }

    /**
     * @Route("/{id}/edit", name="admin_therapy_edit", methods="GET|POST")
     */
    public function edit(Request $request, Therapy $therapy): Response
    {
        $imgFolder = $this->get('kernel')->getRootDir() . '/../public/img/therapies';

        $originalContents = new ArrayCollection();
        foreach ($therapy->getContents() as $content) {
            $originalContents->add($content);
        }


        $form = $this->createForm(TherapyType::class, $therapy);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($originalContents as $content) {
                if (false === $therapy->getContents()->contains($content)) {
                    $content->setTherapy(null);
                    $this->getDoctrine()->getManager()->persist($content);
                }
            }


            // Save file image
            $imageFile = $form->get('image')->getData();
            if (null !== $imageFile) {
                $status = move_uploaded_file($imageFile->getpathName(), $imgFolder.'/'.$imageFile->getClientOriginalName());
                if ($status === true) {
                    $therapy->setImage($imageFile->getClientOriginalName());
                }
            }


            // Save file banner
            $imageFile = $form->get('banner')->getData();

            if (null !== $imageFile) {
                $status = move_uploaded_file($imageFile->getpathName(), $imgFolder.'/'.$imageFile->getClientOriginalName());
                if ($status === true) {
                    $therapy->setBanner($imageFile->getClientOriginalName());
                }
            }

            // Save file of collection fields image
            $contentsData = $form->get('contents');
            foreach ($contentsData as $subForm) {
                $imageFile = $subForm->get('image')->getData();
                $content = $subForm->getData();
                if (null !== $imageFile) {
                    $status = move_uploaded_file($imageFile->getpathName(), $imgFolder.'/'.$imageFile->getClientOriginalName());
                    if ($status === true) {
                        $content->setImage($imageFile->getClientOriginalName());
                    }
                }
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_therapy_edit', ['id' => $therapy->getId()]);
        }

        return $this->render('admin/therapy/edit.html.twig', [
            'therapy' => $therapy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_therapy_delete", methods="DELETE")
     */
    public function delete(Request $request, Therapy $therapy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$therapy->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($therapy);
            $em->flush();
        }

        return $this->redirectToRoute('admin_therapy_index');
    }
}
