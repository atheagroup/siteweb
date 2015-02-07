<?php

namespace admin\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('adminBackendBundle:Admin:index.html.twig');
    }
}
