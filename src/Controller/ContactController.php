<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => "Nom"
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => "Email"
                ]
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'placeholder' => "Sujet"
                ]
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => "Votre message"
                ]
            ])
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $body = '<html><body>';
            $body .= 'Message from '.$form->get('email')->getData().'<br><br>';
            $body .= nl2br($form->get('message')->getData()).'</body></html>';
            $message = (new \Swift_Message('Contact from naturable.fr by '.$form->get('email')->getData()))
                ->setFrom('bonjour@charliebreval.com')
                ->setTo('charliebreval@yahoo.fr')
                ->setBody($body,'text/html')
            ;

            $mailStatus = $mailer->send($message);

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
