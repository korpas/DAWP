<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoryname', TextType::class)
            ->add('submit', SubmitType::class, ['label' => $options['submit_label']])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\Category',
                'submit_label'=>'Nueva Categoria',
            ]
        );

    }

    public function getName()
    {
        return 'app_bundle_category_type';
    }
}
