<?php

namespace Site\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('label' => 'Nom','attr' => array('class' => 'form-control'),'error_mapping' => array('class' => 'alert alert-danger')))
            ->add('prenoms','text',array('label' => 'Nom','attr' => array('class' => 'form-control')))
            ->add('dateNaissance','birthday',array('label' => '','attr' => array('class' => 'form-control')))
            ->add('sexe','choice',array('attr' => array('class' => 'form-control'),
                  'choices' => array('Masculin' => 'Masculin', 'Féminin' => 'Féminin')
            ))
            ->add('nationalite','choice',array('attr' => array('class' => 'form-control'),
                  'choices' =>array('Ivoirienne' =>'Ivoirienne','Autres' =>'Autres')
            ))
            ->add('profession','text',array('attr' => array('class' => 'form-control')))
            ->add('emailPerso','email',array('attr' => array('class' => 'form-control')))
            ->add('employeur','text',array('attr' => array('class' => 'form-control')))
            ->add('dernierDiplome','choice',array('attr' => array('class' => 'form-control'),
                  'choices' =>array('Bac + 7 et plus' => 'Bac + 7 et plus','Bac + 6' => 'Bac + 6','Bac + 5' => 'Bac + 5','Bac + 4' => 'Bac + 4','Bac + 3' =>'Bac + 3','Bac + 2' =>'Bac + 2',
                                    'Bac + 1' => 'Bac + 1','Bac' => 'Bac','BT'=>'BT','BEPC' =>'BEPC','BEP'=>'BEP','BP'=>'BP','CAP' =>'CAP','BEPC'=>'BEPC'
                  )
            ))
            ->add('universiteEcole','text',array('attr' => array('class' => 'form-control')))
            ->add('anneeObtention',null,array('attr' => array('class' => 'form-control')))
            ->add('fonctionActu','text',array('attr' => array('class' => 'form-control')))
            ->add('mobile','text',array('attr' => array('class' => 'form-control'),'required' => false))
            ->add('telephoneBureau','text',array('attr' => array('class' => 'form-control')))
            ->add('emailProfessionel','email',array('attr' => array('class' => 'form-control'),'required' => false))
            ->add('paysResidence','country',array('attr' => array('class' => 'form-control')))
            ->add('ville','text',array('attr' => array('class' => 'form-control')))
            ->add('typeFormation','choice',array('attr' => array('class' => 'form-control'),
                'choices' => array('EVE' => 'Programme Eveil Vie en Entreprise','CV' => 'Programme Claire Vision','MI'=>'Maintenance Informatique','Infographie'=> 'Infographie'
                )
            ))
            ->add('periode','choice',array('attr' => array('class' => 'form-control'),
                  'choices' => array('Janvier' =>'Janvier','Février' => 'Février','Mars' => 'Mars','Avril' => 'Avril','Mai' => 'Mai',"Juin" =>'Juin',
                                     'Juillet' => "Juillet",'Août'=>'Août','Septembre' =>'Septembre','Octobre' => 'Octobre','Novembre' => 'Novembre',
                                     'Décembre' =>'Décembre'
                  )
            ))
            ->add('methodeReglement','choice',array('attr' => array('class' => 'form-control'),
                  'choices' => array('Virement' => 'Virement','Orange Money' => 'Orange Money','Espèces'=>'Espèces'
                  )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Site\FrontendBundle\Entity\Clients'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'site_frontendbundle_clients';
    }
}
