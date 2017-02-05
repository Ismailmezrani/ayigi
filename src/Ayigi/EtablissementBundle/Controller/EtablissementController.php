<?php

namespace Ayigi\EtablissementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtablissementController extends Controller
{
    public function indexAction()
    {
        return $this->render('AyigiEtablissementBundle:Etablissement:index.html.twig');
    }
}
