<?php

namespace Site\ContactUSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('attr' => array('class' => 'form-control')))
            ->add('telephone','text',array('attr' => array('class' => 'form-control')))
            ->add('email','email',array('attr' => array('class' => 'form-control')))
            ->add('suijet','text',array('attr' => array('class' => 'form-control')))
            ->add('message','textarea',array('attr' => array('class' => 'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\ContactUSBundle\Entity\Contact'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_contactusbundle_contact';
    }
}
