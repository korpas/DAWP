<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;





class MessagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('issue', TextType::class, ['error_bubbling' => true, 'attr' => ['class' => 'anyClass']])
            ->add('content', TextareaType::class, ['error_bubbling' => true])
            ->add('categories', EntityType::class, array(
                'class' => 'AppBundle:User',
                'choice_label' => 'categoryname',
            ))
            ->add('save', SubmitType::class,
                array('label'=>'Insertar Producto'))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\User',' AppBundle\Entity\Messages',

            ]
        );

    }

    public function getName()
    {
        return 'app_bundle_messages_type';
    }
}
