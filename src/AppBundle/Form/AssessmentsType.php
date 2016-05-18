<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AssessmentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('user')
        ->add('title', TextType::class, ['error_bubbling' => true, 'attr' => ['class' => 'anyClass']])
        ->add('content', TextareaType::class, ['error_bubbling' => true])
            ->add('save', SubmitType::class,
                array('label'=>'Insertar Producto'))

    ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\Assessments',
            ]
        );
    }

    public function getName()
    {
        return 'app_bundle_assessments_type';
    }
}
