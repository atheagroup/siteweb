<?php
/**
 * Created by PhpStorm.
 * User: Security Trackers
 * Date: 23/12/2014
 * Time: 16:44
 */

namespace Site\FrontendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Site\FrontendBundle\Entity\Metiers;
use Site\FrontendBundle\Entity\NiveauxEtudes;


class NiveauxEtudesData extends AbstractFixture implements OrderedFixtureInterface{

    public function load( ObjectManager $manager)
    {
        // Liste des noms de metier à ajouter
        $noms = array('Bac + 7 et plus' , 'Bac + 6' , 'Bac + 5' , 'Bac + 4','Bac + 3','Bac + 2','Bac + 1','Bac','BT','BEPC','BEP','BP','CAP') ;

        foreach($noms as $i => $nom){
           //On cree le metier
            $Ne[$i] = new NiveauxEtudes();
            $Ne[$i]->setNom($nom);
            $manager->persist($Ne[$i]);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}