<?php

namespace Ayigi\EtablissementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AyigiEtablissementBundle:Default:index.html.twig');
    }
}
