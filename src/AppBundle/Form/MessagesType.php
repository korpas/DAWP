<?php

namespace AppBundle\Form;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;






class MessagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('issue', TextType::class, ['error_bubbling' => true, 'attr' => ['class' => 'anyClass']])
            ->add('content', TextareaType::class, ['error_bubbling' => true])
            ->add('users2', EntityType::class, array(
                'class'    => 'UserBundle:User',
                'choice_value' => 'username'))
            ->add('save', SubmitType::class,
                array('label'=>'Enviar'))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [

                $resolver->setDefaults(array(
                    'data_class'      => 'AppBundle\Entity\Messages','LEKORP\UserBundle\Entity\User'
                ))

            ]
        );

    }

    public function getName()
    {
        return 'app_bundle_messages_type';
    }
}
