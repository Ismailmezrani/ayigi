<?php

namespace Ayigi\PlateFormeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdministrateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
                ->add('prenom')
                ->add('datedenaissance')
                ->add('email')
                ->add('telephone')
                ->add('datederniereconnexion')
                ->add('username')
                ->add('plainPassword')
                ->add('profil', ChoiceType::class, array(
                       
                    'choices'   =>array(
                    'ROLE_SERVICECLIENT' =>  'Service client',
                    'ROLE_SUPERVISEUR'  =>  'Superviseur',
                    'ROLE_ADMIN'     =>  'Admin',
                    'ROLE_SUPER_ADMIN'     =>  'Super Admin',
                    ), '
                    required' => true,
                ))
             

                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ayigi\PlateFormeBundle\Entity\Administrateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ayigi_plateformebundle_administrateur';
    }


}
