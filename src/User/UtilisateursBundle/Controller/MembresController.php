<?php

namespace User\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Partenaires controller.
 *
 */
class MembresController extends Controller
{

    /**
     * Lists all Partenaires entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $membres = $em->getRepository('UserUtilisateursBundle:User')->findAll();

        return $this->render('UserUtilisateursBundle:Default:membres/index.html.twig', array(
            'membres' => $membres
        ));
    }

}
