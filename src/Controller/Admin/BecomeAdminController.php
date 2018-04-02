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
 * @Route("/become-admin")
 */
class BecomeAdminController extends Controller
{
    /**
     * @Route("/", name="admin_become_admin", methods="GET")
     */
    public function index(): Response
    {
        $user = $this->getUser();

        if ($user) {
            $user->addRole('ROLE_ADMIN');

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->get('security.token_storage')->setToken(null);
        }

        return $this->redirectToRoute('home');
    }
}
