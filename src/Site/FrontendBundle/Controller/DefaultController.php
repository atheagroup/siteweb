<?php

namespace Site\FrontendBundle\Controller;

use Site\FrontendBundle\Entity\Clients;
use Site\FrontendBundle\Form\ClientsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    //Le functions qui donne le total des offres,images,et videos
    public function InfosBlogLeftAction(){

        $em = $this->getDoctrine()->getManager();
        $emploi = $em->getRepository("SiteFrontendBundle:Article")->findAll();
        $images = $em->getRepository("SiteFrontendBundle:Galerie")->findAll();
        $clients = $em->getRepository("SiteFrontendBundle:Partenaires")->findAll();
        $totalEmplois = count($emploi);
        $totalImages = count($images);
        return $this->render('SiteFrontendBundle:Default:includes/right-block.html.twig',array('totalOffres' =>$totalEmplois,
                                                                                               'totalImages' => $totalImages,
                                                                                               'clients' => $clients
        ));
    }
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $liste_emplois = $em->getRepository("SiteFrontendBundle:Article")->offreALaUne();
        return $this->render('SiteFrontendBundle:Default:index.html.twig',array('emplois' => $liste_emplois));
    }

    public function connexionAction()
    {
        return $this->render('SiteFrontendBundle:Default:connexion/connexion.html.twig');
    }

    public function inscriptionAction()
    {
        $client = new Clients();
        $form  = $this->createForm( new ClientsType(),$client);
         if($this->getRequest()->getMethod() == 'POST')
         {
             $form->handleRequest($this->getRequest());

             if($form->isValid()){
                 $em = $this->getDoctrine()->getManager();
                 $em->persist($client);
                 $em->flush();
                 $this->get('session')->getFlashBag()->add('success','Inscription validée, Nous vous contacterons ultérieurement.');
                 return $this->redirect($this->generateUrl("site_frontend_inscription"));
             }
         }
        return $this->render('SiteFrontendBundle:Default:inscription/inscription.html.twig',array('form' => $form->createView()));
    }

    public function contactAction()
    {
        return $this->render('SiteFrontendBundle:Default:contact/contact.html.twig');
    }

    public function aproposAction()
    {
        return $this->render('SiteFrontendBundle:Default:apropos/apropos.html.twig');
    }

    public function telecomAction()
    {
        return $this->render('SiteFrontendBundle:Default:telecom/telecom.html.twig');
    }

    public function videosurveillanceAction()
    {
        return $this->render('SiteFrontendBundle:Default:telecom/vp.html.twig');
    }
    public function telemetrieAction()
    {
        return $this->render('SiteFrontendBundle:Default:telecom/telemetrie.html.twig');
    }
    public function pabxAction()
    {
        return $this->render('SiteFrontendBundle:Default:telecom/pabx.html.twig');
    }
    public function galerieAction()
    {
        return $this->render('SiteFrontendBundle:Default:galerie/galerie.html.twig');
    }
    public function galerieImageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $findimages = $em->getRepository("SiteFrontendBundle:Galerie")->findAllGalerie();
        $images  = $this->get('knp_paginator')->paginate($findimages,$this->get('request')->query->get('page', 1), 3);
        return $this->render('SiteFrontendBundle:Default:galerie/images.html.twig',array('images' => $images));
    }
    public function emploiAction()
    {

        $em = $this->getDoctrine()->getManager();
        $findemplois = $em->getRepository("SiteFrontendBundle:Article")->findAllOffre();
        $liste_emplois  = $this->get('knp_paginator')->paginate($findemplois,$this->get('request')->query->get('page', 1), 3);
        return $this->render('SiteFrontendBundle:Default:emploi/emploi.html.twig',array('emplois' => $liste_emplois));
    }

    public function presentationEmploiAction($title,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $emploi = $em->getRepository("SiteFrontendBundle:Article")->find($id);
        if(!$emploi) throw $this->createNotFoundException("Page introuvable");
        return $this->render('SiteFrontendBundle:Default:emploi/presentation.html.twig',array('emploi' => $emploi));
    }

    public function formationAction()
    {
        return $this->render('SiteFrontendBundle:Default:formation/formations.html.twig');
    }

    public function materielmeddicalAction()
    {
        return $this->render('SiteFrontendBundle:Default:materielsMedicaux/materielsMedicaux.html.twig');
    }



}
