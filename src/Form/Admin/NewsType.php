<?php

namespace App\Form\Admin;

use App\Entity\Admin\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('image', FileType::class, [
                'required' => false,
                'mapped' => false
            ])
            ->add('bigImage', FileType::class, [
                'label' => 'Grande image',
                'required' => false,
                'mapped' => false
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
