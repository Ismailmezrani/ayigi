<?php

namespace Ayigi\EtablissementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
        
        ->add('telephone')
        ->add('email')
        ->add('paysDestination', EntityType::class, array(
            'class'         => 'AyigiPlateFormeBundle:PaysDestination',
            'choice_label'  => 'nom',
            'multiple'      => true,
            ))
        ->add('adresse')
        ->add('ville')
        ->add('codepostal')
        ->add('username')
        ->add('plainPassword')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ayigi\EtablissementBundle\Entity\Etablissement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ayigi_etablissementbundle_etablissement';
    }


}
