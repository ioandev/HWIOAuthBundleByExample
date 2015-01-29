<?php

namespace CodeMe\TheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    public function loginAction()
    {
        return $this->render('default/login.html.twig');
    }

    public function logoutAction() {
        $this->container->get('security.context')->setToken(NULL);
        $this->container->get('session')->remove('user');

        return $this->redirectToRoute('home');
    }
}
