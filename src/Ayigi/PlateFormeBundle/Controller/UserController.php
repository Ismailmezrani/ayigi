<?php

namespace Ayigi\PlateFormeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\View;

use Ayigi\UserBundle\Entity\User;
use Ayigi\UserBundle\Form\UserType;



class UserController extends Controller
{

    public function getUsersAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();
        /* @var $places Place[] */

        $formatted = [];
        foreach ($users as $user) {
            $formatted[] = [
               'id' => $user->getId(),
               'name' => $user->getName(),
               
            ];
        }

        return new JsonResponse($formatted);
    }

    public function getUserAction($username)
    {
	    $user = $this->getDoctrine()->getRepository('UserBundle:User')->findOneByUsername($username);
	    if(!is_object($user)){
	      throw $this->createNotFoundException();
	    }
	    return $user;
	}

    public function postUserAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$user = new User();

    	$form = $this->get('form.factory')->create(UserType::class, $user);

    	if ($request->getMethod()=='POST') {
    		$form->bind($request);

            if($form->isValid())
            {
            	$user= $form->getData();

            	$em->persist($user);
                $em->flush();

            	return $this->redirect($this->generateUrl('ayigi_plateforme_admin_see_user',array(
                'id' => $user->getId(),
                )));
            }
    	}
    	return $this->render('AyigiPlateFormeBundle:PlateFormeAdmin:createuser.html.twig', array(
            'form' => $form->createView(),
            ));
    }

}