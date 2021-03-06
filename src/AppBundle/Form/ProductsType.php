<?php

namespace AppBundle\Form;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('productname', TextType::class, ['error_bubbling' => true, 'attr' => ['class' => 'anyClass']])
            ->add('description', TextareaType::class, ['error_bubbling' => true])
            ->add('price', MoneyType::class, ['error_bubbling' => true])
            ->add('categories', EntityType::class, array(
             'class' => 'AppBundle:Category',
             'choice_label' => 'categoryname',
             'multiple' =>  true,
             'expanded' => true
    ))

            ->add('prodFile', VichImageType::class,[
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_link' => true, // not mandatory, default is true

            ])



            ->add('save', SubmitType::class,
                array('label'=>'Insertar Producto '))

        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\Products',' AppBundle\Entity\Category',

            ]
        );

    }

    public function getName()
    {
        return 'app_bundle_products_type';

    }


}
