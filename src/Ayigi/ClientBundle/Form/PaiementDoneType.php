<?php

namespace Ayigi\ClientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PaiementDoneType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('montant')
                ->add('nom')
                ->add('prenom')
                ->add('telephone')
                ->add('message')
                ->add('montantrecu')
                ->add('paysDestination', EntityType::class, array(
                    'class'         => 'AyigiPlateFormeBundle:PaysDestination',
                    'choice_label'  => 'nom',
                    'multiple'      => false,
                    ))

                ->add('etablissements', EntityType::class, array(
                        'class'        => 'AyigiEtablissementBundle:Etablissement',
                        'choice_label' => 'nom',
                        'multiple'     => false,
                    ))

                ->add('service', EntityType::class, array(
                        'class'        => 'AyigiPlateFormeBundle:Service',
                        'choice_label' => 'nom',
                        'multiple'     => false,
                    ))

                ->add('devise', EntityType::class, array(
                        'class'        => 'AyigiClientBundle:devise',
                        'choice_label' => 'nom',
                        'multiple'     => false,
                    ))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ayigi\ClientBundle\Entity\PaiementDone'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ayigi_clientbundle_paiementdone';
    }


}
