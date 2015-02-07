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
class PartenairesAdminController extends Controller
{

    /**
     * Lists all Partenaires entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiteFrontendBundle:Partenaires')->findAll();

        return $this->render('SiteFrontendBundle:Admin:Partenaires/index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Partenaires entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Partenaires();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminPartenaires_show', array('id' => $entity->getId())));
        }

        return $this->render('SiteFrontendBundle:Admin:Partenaires/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Partenaires entity.
     *
     * @param Partenaires $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Partenaires $entity)
    {
        $form = $this->createForm(new PartenairesType(), $entity, array(
            'action' => $this->generateUrl('adminPartenaires_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Ajouter','attr' => array('class' => 'btn btn-xs btn-success')));

        return $form;
    }

    /**
     * Displays a form to create a new Partenaires entity.
     *
     */
    public function newAction()
    {
        $entity = new Partenaires();
        $form   = $this->createCreateForm($entity);

        return $this->render('SiteFrontendBundle:Admin:Partenaires/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Partenaires entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Partenaires')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partenaires entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontendBundle:Admin:Partenaires/show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Partenaires entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Partenaires')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partenaires entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontendBundle:Admin:Partenaires/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Partenaires entity.
    *
    * @param Partenaires $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Partenaires $entity)
    {
        $form = $this->createForm(new PartenairesType(), $entity);

        return $form;
    }
    /**
     * Edits an existing Partenaires entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Partenaires')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partenaires entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adminPartenaires_edit', array('id' => $id)));
        }

        return $this->render('SiteFrontendBundle:Admin:Partenaires/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Partenaires entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiteFrontendBundle:Partenaires')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Partenaires entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminPartenaires'));
    }

    /**
     * Creates a form to delete a Partenaires entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminPartenaires_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer','attr' => array('class' => 'btn btn-xs btn-danger')))
            ->getForm()
        ;
    }

    public function ClientsFormationListAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiteFrontendBundle:Partenaires')->find($id);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiteFrontendBundle:Admin:Partenaires/show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }


}
