<?php

namespace Site\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\FrontendBundle\Entity\Partenaires;
use Site\FrontendBundle\Form\PartenairesType;

/**
 * Partenaires controller.
 *
 */
class ClientsController extends Controller
{

    /**
     * Lists all Partenaires entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontendBundle:Clients')->findAll();

        return $this->render('SiteFrontendBundle:Admin:clients/index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Clients')->find($id);

        return $this->render('SiteFrontendBundle:Admin:clients/show.html.twig', array(
            'entity'      => $entity,
        ));
    }

    //Les Notifications pour les clients qui veulent une formation
    public function notificationClientsFormationAction(){

        $em = $this->getDoctrine()->getManager();
        $Clients = $em->getRepository("SiteFrontendBundle:Clients")->clientBy();
        $em = $this->getDoctrine()->getManager();
        $ClientsT = $em->getRepository("SiteFrontendBundle:Clients")->clientNotifBy();
        $TotalNoti = count($ClientsT);
        return $this->render('SiteFrontendBundle:Admin:includes/notificationsClient.html.twig',array('clients' =>$Clients,
            'totalNotif' => $TotalNoti
        ));
    }

    public function modificationNotifAction($id){
        $em = $this->getDoctrine()->getManager();
        $Clients = $em->getRepository("SiteFrontendBundle:Clients")->clientNotifModif($id);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SiteFrontendBundle:Clients')->find($id);

        return $this->render('SiteFrontendBundle:Admin:clients/show.html.twig', array(
            'entity'      => $entity,
        ));
    }


}
