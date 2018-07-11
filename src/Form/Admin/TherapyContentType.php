<?php

namespace App\Form\Admin;

use App\Entity\Admin\TherapyContent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TherapyContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre'
            ])
            ->add('topTitle', null, [
                'label' => 'Titre du dessus'
            ])
            ->add('text', null, [
                'label' => 'Corps',
                'attr' => [
                    'class' => 'awesome-ckeditor'
                ]
            ])
            ->add('position', null, [
                'label' => 'Position'
            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TherapyContent::class,
        ]);
    }
}
