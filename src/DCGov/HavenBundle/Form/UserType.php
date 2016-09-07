<?php

namespace DCGov\HavenBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('password')
            ->add('firstname')
            ->add('lastname')
            ->add('isactive')
            ->add('modifiedBy')
            ->add('modifiedTimestamp', 'datetime')
            ->add('createdBy')
            ->add('createdTimestamp', 'datetime')
            ->add('role')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DCGov\HavenBundle\Entity\User'
        ));
    }
}
