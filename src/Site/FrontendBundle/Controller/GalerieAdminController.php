<?php

namespace Site\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\FrontendBundle\Entity\Galerie;
use Site\FrontendBundle\Form\GalerieType;

/**
 * Galerie controller.
 *
 */
class GalerieAdminController extends Controller
{

    /**
     * Lists all Galerie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontendBundle:Galerie')->findAll();

        return $this->render('SiteFrontendBundle:Admin:Galerie/index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Galerie entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Galerie();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->getImage()->setName($entity->getNom());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminGalerie_show', array('id' => $entity->getId())));
        }

        return $this->render('SiteFrontendBundle:Admin:Galerie/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Galerie entity.
     *
     * @param Galerie $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Galerie $entity)
    {
        $form = $this->createForm(new GalerieType(), $entity, array(
            'action' => $this->generateUrl('adminGalerie_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Ajouter','attr' => array('class' => 'btn btn-xs btn-success')));

        return $form;
    }

    /**
     * Displays a form to create a new Galerie entity.
     *
     */
    public function newAction()
    {
        $entity = new Galerie();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteFrontendBundle:Admin:Galerie/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Galerie entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Galerie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Galerie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontendBundle:Admin:Galerie/show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Galerie entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Galerie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Galerie entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontendBundle:Admin:Galerie/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Galerie entity.
    *
    * @param Galerie $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Galerie $entity)
    {
        $form = $this->createForm(new GalerieType(), $entity);

        return $form;
    }
    /**
     * Edits an existing Galerie entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Galerie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Galerie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adminGalerie_edit', array('id' => $id)));
        }

        return $this->render('SiteFrontendBundle:Admin:Galerie/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Galerie entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontendBundle:Galerie')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Galerie entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminGalerie'));
    }

    /**
     * Creates a form to delete a Galerie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminGalerie_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer','attr' => array('class' => 'btn btn-xs btn-danger')))
            ->getForm()
        ;
    }
}
