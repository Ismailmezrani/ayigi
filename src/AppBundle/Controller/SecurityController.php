<?php

namespace AppBundle\Controller;

use Ayigi\ClientBundle\Entity\Client;
use Ayigi\ClientBundle\Form\ClientType;
use FOS\RestBundle\Controller\Annotations\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SecurityController
 * @package AppBundle\Controller
 */
class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @Route("/espace-client/login", name="client_login")
     * @Route("/ayigi-admin/login", name="admin_login")
     * @Route("/espace-partenaire/login", name="partenaire_login")
     * @Method({"GET", "POST"})
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
	{

        $route = "client_homepage";
        $template = "default/index.html.twig";
        if ($request->get('_route') === 'admin_login') {
            $route = "admin_homepage";
            $template = "AyigiPlateFormeBundle:Security:login.html.twig";
        }
        if ($request->get('_route') === 'partenaire_login') {
            $route = "partenaire_dashboard";
            $template = "EtablissementBundle:Security:login.html.twig";
        }

        // Si l'utilisateur est déjà connecté, on le redirige vers la page d'acceuil
        if ($this->getUser()) {
            return $this->redirectToRoute($route);
        }

        $authenticationUtils = $this->get('security.authentication_utils');

	    return $this->render($template, array(
	      'last_username' => $authenticationUtils->getLastUsername(),
	      'error'         => $authenticationUtils->getLastAuthenticationError(),
	    ));
	}

    /**
     * @Route("/registration", name="client_create_compte")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return RedirectResponse
     */
    //--------------------- Manage plateforme client --------------------------------------------------------------
    public function createCompteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);


        if ($form->handleRequest($request) && $form->isValid()) {

            $factory = $this->get('security.password_encoder');
            $client->setPassword($factory->encodePassword($client, $client->getPlainPassword()));

            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_login');
        }

        return $this->render('AyigiClientBundle:Client:createCompte.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * Gestion de la déconnexion du site
     *
     * @Route("/espace-client/logout", name="client_logout")
     * @Route("/ayigi-admin/logout", name="admin_logout")
     * @Route("/espace-partenaire/logout", name="partenaire_logout")
     * @Method({"GET"})
     */
    public function logoutAction()
    {
        // this controller will not be executed, as the route is handled by the Security system
    }

}
