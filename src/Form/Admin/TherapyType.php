<?php

namespace App\Form\Admin;

use App\Entity\Admin\Therapy;
use App\Form\Admin\TherapyContentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TherapyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'preventive' => 'preventive',
                    'complementary' => 'complementary'
                ],
                'label' => 'Catégorie'
            ])
            ->add('title', null, [
                'label' => 'Titre'
            ])
            ->add('subtitle', null, [
                'label' => 'Sous-titre'
            ])
            ->add('image')
            ->add('banner', null, [
                'label' => 'Bannière'
            ])
            ->add('contents', CollectionType::class, array(
                'entry_type' => TherapyContentType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Therapy::class,
        ]);
    }
}
