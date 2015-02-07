<?php

namespace Site\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultNotificationController extends Controller
{
    //Le functions qui donne le total des offres,images,et videos
    public function notificationAction(){

        $em = $this->getDoctrine()->getManager();
        $emploi    = $em->getRepository("SiteFrontendBundle:Article")->findAll();
        $images    = $em->getRepository("SiteFrontendBundle:Galerie")->findAll();
        $clients   = $em->getRepository("SiteFrontendBundle:Partenaires")->findAll();
        $metiers   = $em->getRepository("SiteFrontendBundle:Metiers")->findAll();
        $villes   = $em->getRepository("SiteFrontendBundle:Villes")->findAll();
        $inscrire   = $em->getRepository("SiteFrontendBundle:Clients")->findAll();
        $users   = $em->getRepository("UserUtilisateursBundle:User")->findAll();

        $totalEmplois = count($emploi);
        $totalClients = count($clients);
        $totalImages = count($images);
        $totalMetiers = count($metiers);
        $totalVilles = count($villes);
        $totalInscrire = count($inscrire);
        $totalUsers = count($users);

        return $this->render('SiteFrontendBundle:Default:includes/notificationAdmin.html.twig',array('totalOffres' => $totalEmplois,
                                                                                                           'totalImages' => $totalImages,
                                                                                                           'clients' => $totalClients,
                                                                                                           'villes' => $totalVilles,
                                                                                                           'metiers' => $totalMetiers,
                                                                                                           'inscireFormation' => $totalInscrire,
                                                                                                           'membres'  => $totalUsers,
        ));
    }

}
