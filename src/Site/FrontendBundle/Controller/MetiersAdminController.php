<?php

namespace Site\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\FrontendBundle\Entity\Metiers;
use Site\FrontendBundle\Form\MetiersType;

/**
 * Metiers controller.
 *
 */
class MetiersAdminController extends Controller
{

    /**
     * Lists all Metiers entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontendBundle:Metiers')->findAll();

        return $this->render('SiteFrontendBundle:Admin:Metiers/index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Metiers entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Metiers();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminMetiers_show', array('id' => $entity->getId())));
        }

        return $this->render('SiteFrontendBundle:Admin:Metiers/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Metiers entity.
     *
     * @param Metiers $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Metiers $entity)
    {
        $form = $this->createForm(new MetiersType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Ajouter','attr' => array('class' => 'btn btn-xs btn-success')));

        return $form;
    }

    /**
     * Displays a form to create a new Metiers entity.
     *
     */
    public function newAction()
    {
        $entity = new Metiers();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteFrontendBundle:Admin:Metiers/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Metiers entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Metiers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metiers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontendBundle:Admin:Metiers/show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Metiers entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Metiers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metiers entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontendBundle:Admin:Metiers/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Metiers entity.
    *
    * @param Metiers $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Metiers $entity)
    {
        $form = $this->createForm(new MetiersType(), $entity );

        return $form;
    }
    /**
     * Edits an existing Metiers entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Metiers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Metiers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adminMetiers_edit', array('id' => $id)));
        }

        return $this->render('SiteFrontendBundle:Admin:Metiers/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Metiers entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontendBundle:Metiers')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Metiers entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminMetiers'));
    }

    /**
     * Creates a form to delete a Metiers entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminMetiers_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete','attr' => array('class' => 'btn btn-xs btn-danger')))
            ->getForm()
        ;
    }
}
