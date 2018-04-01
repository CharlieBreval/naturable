<?php

namespace App\Form\Admin;

use App\Entity\Admin\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre'
            ])
            ->add('createdAt')
            ->add('image')
            ->add('bigImage', null, [
                'label' => 'Grande image'
            ])
            ->add('text', null, [
                'label' => 'Texte',
                'attr' => [
                    'class' => 'awesome-ckeditor'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}
