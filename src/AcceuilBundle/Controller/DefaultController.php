<?php

namespace AcceuilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('AcceuilBundle:Default:index.html.twig');

    }
    public function acceuilAction()
    {
        return $this->render('AcceuilBundle:Default:acceuil.html.twig');
    }
}
