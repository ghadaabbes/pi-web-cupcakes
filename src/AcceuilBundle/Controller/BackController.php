<?php
/**
 * Created by PhpStorm.
 * User: beryl kristina
 * Date: 07/02/2018
 * Time: 14:06
 */

namespace AcceuilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class BackController extends  Controller
{
    public function index1Action()
    {
        return $this->render('AcceuilBundle:Back:backLayout.html.twig');

    }

    public function acceuilAction()
    {
        return $this->render('AcceuilBundle:Back:acceuil.html.twig');

    }
    public function afficheproduitAction()
    {
        return $this->render('AcceuilBundle:Back:afficheproduit.html.twig');

    }

    public function clientsAction()
    {
        return $this->render('AcceuilBundle:Back:clients.html.twig');

    }

    public function patisserieAction()
    {
        return $this->render('AcceuilBundle:Back:patisserie.html.twig');

    }

    public function promotionAction()
    {
        return $this->render('AcceuilBundle:Back:promotions.html.twig');

    }
    public function wishlistAction()
    {
        return $this->render('AcceuilBundle:Back:wishlist.html.twig');

    }

    public function statistiqueAction()
    {
        return $this->render('AcceuilBundle:Back:statistique.html.twig');

    }

}