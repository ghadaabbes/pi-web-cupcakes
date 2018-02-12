<?php

namespace User\UserBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {

        return $this->render('UserUserBundle:Default:index.html.twig', ['base_dir' =>realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,]);
    }
    /**
     * @Router("/user/test", name="testRoleUser")
     */
    public function testRoleUserAction(Request $request)
    {
        $this ->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('exemples_roles/hello-world.html.twig');
    }
    /**
     * @Router("/admin/test",name="testRoleAdmin")
     */
    public function testRoleAdminAction(Request $request)
    {
        //Va modifier l'email de l'utilisateur connecté
        $this ->denyAccessUnlessGranted('ROLE_ADMIN');
        $user=$this->getUser()->setEmail('ghadaabbes1@gmail.com');
        $em=$this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->render('exemples_roles/hello-world-admin.html.twig');
    }
}
