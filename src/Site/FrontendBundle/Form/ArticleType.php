<?php

namespace Site\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Site\FrontendBundle\Form\MediaType;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text',array('label' =>"Titre de l'offre",'attr' => array('class' => 'form-control')))
            ->add('nomEntreprise','text',array('label' =>"Nom de l'entreprise",'attr' => array('class' => 'form-control')))
            ->add('typeOffre','choice',array('label' =>"Type de l'offre",'attr' => array('class' => 'form-control'),
                  'choices' => array('Emploi' => 'Emploi','Stage' =>'Stage')
                 ))
            ->add('ville','entity',array('label' =>"Lieu du stage",'attr' => array('class' => 'form-control'),
                   'class' => 'SiteFrontendBundle:Villes',
                   'property' => 'nom',
                   'expanded' => false,
                   'multiple' => false
                ))
            ->add('dateLimite','date',array('attr' => array('class' => '')))
            ->add('metiers','entity',array('label' =>"Type de métier",'attr' => array('class' => 'form-control'),
                  'class' => 'SiteFrontendBundle:Metiers',
                  'property' => 'nom',
                  'multiple' => true
            ))
            ->add('niveauEtudes','entity',array('label' =>"Niveau(x) d'études :",'attr' => array('class' => 'form-control'),
                  'class' => 'SiteFrontendBundle:NiveauxEtudes',
                  'property' => 'nom',
                  'multiple' => true
                ))
            ->add('experiences','text',array('label' =>"Expériences",'attr' => array('class' => 'form-control')))
            ->add('contenu','textarea',array('label' =>"Contenu",'attr' => array('class' => 'ckeditor')))
            ->add('logo',new MediaType(),array('label' =>"Selectionner le logo de l'entreprise"))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\FrontendBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_frontendbundle_article';
    }
}
