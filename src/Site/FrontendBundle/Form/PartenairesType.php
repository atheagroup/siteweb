<?php

namespace Site\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartenairesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('label' => 'Nom','attr' => array('class' => 'form-control')))
            ->add('lienSiteweb','text',array('label' => 'Nom','attr' => array('class' => 'form-control')))
            ->add('logo',new MediaType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\FrontendBundle\Entity\Partenaires'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_frontendbundle_partenaires';
    }
}
