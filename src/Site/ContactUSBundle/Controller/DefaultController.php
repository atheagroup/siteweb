<?php

namespace Site\ContactUSBundle\Controller;

use Site\ContactUSBundle\Entity\Contact;
use Site\ContactUSBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);

        if ($this->getRequest()->getMethod() == 'POST'){
            $form->handleRequest($request);
            if ($form->isValid()) {

                $noms = $contact->setNom($contact->getNom());
                $telephones = $contact->setTelephone($contact->getTelephone());
                $emails = $contact->setEmail($contact->getEmail());
                $sujets = $contact->setSuijet($contact->getSuijet());
                $contenus = $contact->setMessage($contact->getMessage());

                //Ici le mail de validation (NB On peux meme use un servce pr sa)
                 $message = \Swift_Message::newInstance()
                    ->setSubject($contact->getNom())
                    ->setFrom(array($contact->getEmail() => $contact->getNom()))
                    ->setTo('arsenelequebecois@gmail.com')
                    ->setCharset("utf-8")
                    ->setBody($this->renderView('SiteContactUSBundle:Default:contact/messageTemplate.html.twig',array(
                        'nom' => $noms,
                        'telephone' => $telephones,
                        'email' => $emails,
                        'sujet' => $sujets,
                        'contenu' =>$contenus
                    )));

                $this->get("mailer")->send($message);
                /*$em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();*/
                $this->get('session')->getFlashBag()->add('infos','Merci de nous avoir contacté, vous préoccupation se traitée par nos conseilliers.');
                return $this->redirect($this->generateUrl("site_contact_us_homepage"));

            }
        }
        return $this->render('SiteContactUSBundle:Default:contact/contact.html.twig', array('form' => $form->createView()));
    }
}
