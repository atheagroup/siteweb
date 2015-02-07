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
use Site\FrontendBundle\Entity\Villes;


class VillesData extends AbstractFixture implements OrderedFixtureInterface{

    public function load( ObjectManager $manager)
    {
        // Liste des noms de metier à ajouter
        $noms = array('Aboisso' , 'Daloa' , 'Bouaké' , 'Abengourou') ;

        foreach($noms as $i => $nom){
           //On cree le metier
            $listeVille[$i] = new Villes();
            $listeVille[$i]->setNom($nom);
            $manager->persist($listeVille[$i]);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}