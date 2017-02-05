<?php

namespace Ayigi\PlateFormeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
	{
	    // Si le visiteur est déjà identifié, on le redirige vers l'accueil
//	    if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
//	      return $this->redirectToRoute('app');
//	    }

	    // Le service authentication_utils permet de récupérer le nom d'utilisateur
	    // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
	    // (mauvais mot de passe par exemple)
	    $authenticationUtils = $this->get('security.authentication_utils');

	    return $this->render('AyigiPlateFormeBundle:Security:login.html.twig', array(
	      'last_username' => $authenticationUtils->getLastUsername(),
	      'error'         => $authenticationUtils->getLastAuthenticationError(),
	    ));
	}


	public function loginCheckAction()
    {
        throw new \Exception('This should never be reached!');
    }
 
    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in app/config/security.yml 
     */
    public function logoutAction()
    {
        throw new \Exception('This should never be reached!');
  	}

}
