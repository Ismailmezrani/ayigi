<?php

namespace Ayigi\ClientBundle\Form;

use Ayigi\ClientBundle\Entity\PaiementDone;
use Ayigi\EtablissementBundle\Entity\Etablissement;
use Ayigi\PlateFormeBundle\Entity\PaysDestination;
use Ayigi\PlateFormeBundle\Entity\Service;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PaiementDoneType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var EntityManager $em */
        $em = $options['em'];
        $builder
//            ->add('service', EntityType::class, array(
//                'class'        => 'AyigiPlateFormeBundle:Service',
//                'choice_label' => 'nom',
//                'multiple'     => false,
//            ))

            ->add('paysDestination', EntityType::class, array(
                'class' => 'AyigiPlateFormeBundle:PaysDestination',
                'choice_label' => 'nom',
                'multiple' => false,
                'placeholder' => 'select'
            ));


        $formModifier = function (FormInterface $form, PaysDestination $destination = null) use ($em) {
            $etablissements = null === $destination ? $em->getRepository(Etablissement::class)->findAll() : $em->getRepository(Etablissement::class)->EtablissementPays($destination->getId());
            $form->add('etablissements', EntityType::class, array(
                'class' => 'AyigiEtablissementBundle:Etablissement',
                'placeholder' => 'select',
                'choices' => $etablissements,
                'choice_label' => 'nom',
                'multiple' => false,
            ));
        };

        $formModifierServices = function (FormInterface $form, Etablissement $etablissement = null) use ($em) {
            $services = null === $etablissement ? $em->getRepository(Service::class)->findAll() : $em->getRepository(Service::class)->ServiceEtablissement($etablissement->getId());
            $form->add('service', EntityType::class, array(
                'class' => 'AyigiPlateFormeBundle:Service',
                'placeholder' => 'select',
                'choices' => $services,
                'choice_label' => 'nom',
                'multiple' => false,
            ));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getPaysDestination());
            }
        );

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifierServices) {
                $data = $event->getData();
                $formModifierServices($event->getForm(), $data->getEtablissements());
            }
        );

        $builder->get('paysDestination')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $destination = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $destination);
            }
        );
        if ($builder->has('etablissements')) {
            $builder->get('etablissements')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) use ($formModifierServices) {
                    dump($event->getForm()->getData());
                    $etablissement = $event->getForm()->getData();
                    $formModifierServices($event->getForm()->getParent(), $etablissement);
                }
            );
        }
        $builder->add('devise', EntityType::class, array(
            'class' => 'AyigiClientBundle:devise',
            'choice_label' => 'nom',
            'multiple' => false,
            'placeholder' => 'select'
        ))
            ->add('montant')
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('message')
            ->add('montantrecu');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PaiementDone::class
        ));
        $resolver->setRequired('em');
    }


}
