<?php

namespace Ayigi\PlateFormeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AyigiPlateFormeBundle:Default:index.html.twig');
    }
}
