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
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_index", methods="GET")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }
}
