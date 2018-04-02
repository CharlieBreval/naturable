<?php

namespace App\Form\Admin;

use App\Entity\Admin\Conference;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConferenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre'
            ])
            ->add('image')
            ->add('content', null, [
                'label' => 'Contenu',
                'attr' => [
                    'class' => 'awesome-ckeditor'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Conference::class,
        ]);
    }
}
