<?php

namespace Site\FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\FrontendBundle\Entity\Villes;
use Site\FrontendBundle\Form\VillesType;

/**
 * Villes controller.
 *
 */
class VillesAdminController extends Controller
{

    /**
     * Lists all Villes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontendBundle:Villes')->findAll();

        return $this->render('SiteFrontendBundle:Admin:Villes/index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Villes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Villes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminVilles_show', array('id' => $entity->getId())));
        }

        return $this->render('SiteFrontendBundle:Admin:Villes/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Villes entity.
     *
     * @param Villes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Villes $entity)
    {
        $form = $this->createForm(new VillesType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Ajouter','attr' => array('class' => 'btn btn-xs btn-success')));

        return $form;
    }

    /**
     * Displays a form to create a new Villes entity.
     *
     */
    public function newAction()
    {
        $entity = new Villes();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteFrontendBundle:Admin:Villes/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Villes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Villes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontendBundle:Admin:Villes/show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Villes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Villes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontendBundle:Admin:Villes/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Villes entity.
    *
    * @param Villes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Villes $entity)
    {
        $form = $this->createForm(new VillesType(), $entity);

        return $form;
    }
    /**
     * Edits an existing Villes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Villes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adminVilles_edit', array('id' => $id)));
        }

        return $this->render('SiteFrontendBundle:Admin:Villes/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Villes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontendBundle:Villes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Villes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminVilles'));
    }

    /**
     * Creates a form to delete a Villes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminVilles_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer','attr' => array('class' => 'btn btn-xs btn-danger')))
            ->getForm()
        ;
    }
}
