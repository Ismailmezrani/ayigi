<?php

namespace Ayigi\PlateFormeBundle\Controller;

use Ayigi\ClientBundle\Entity\Client;
use Ayigi\ClientBundle\Form\ClientType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

use Ayigi\PlateFormeBundle\Entity\Administrateur;
use Ayigi\PlateFormeBundle\Form\AdministrateurType;
use Ayigi\PlateFormeBundle\Entity\PaysDestination;
use Ayigi\PlateFormeBundle\Form\PaysDestinationType;
use Ayigi\PlateFormeBundle\Entity\Service;
use Ayigi\PlateFormeBundle\Form\ServiceType;

use Ayigi\EtablissementBundle\Entity\Etablissement;
use Ayigi\EtablissementBundle\Form\EtablissementType;

/**
 * Controller de Front Office
 * @Route("/ayigi-admin")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_homepage")
     * @Method({"GET", "POST"})
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction()
    {
        return $this->render('AyigiPlateFormeBundle:Admin:index.html.twig');
    }

    /**
     * @Route("/create-user/", name="admin_create_user" )
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return RedirectResponse
     */
//--------------------- Manage plateforme User --------------------------------------------------------------
    public function createUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $adminUser = new Administrateur();

        $form = $this->createForm(AdministrateurType::class, $adminUser);


        if($form->handleRequest($request) && $form->isValid())
        {
            $adminUser= $form->getData();

            $factory = $this->container->get('security.encoder_factory');
            $encoder = $factory->getEncoder($adminUser);
            $adminUser->encodePassword($encoder);

            $em->persist($adminUser);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_user'));
        }

        return $this->render('AyigiPlateFormeBundle:Admin:createUser.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    /**
     * @Route("/update-user/{id}", name="admin_update_user" )
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Administrateur $administrateur
     * @return RedirectResponse
     */
    public function updateUserAction(Request $request, Administrateur $administrateur)
    {
        $em = $this->getDoctrine()->getManager();
        
        $form = $this->createForm(AdministrateurType::class, $administrateur);

        if($form->handleRequest($request)&& $form->isValid())
        {
            $em->persist($administrateur);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_user'));
        }
        return $this->render('AyigiPlateFormeBundle:Admin:updateUser.html.twig', array(
            'form' => $form->createView(),
            'adminUser' => $administrateur,
            ));
    }

    /**
     * @Route("/delete-user/{id}", name="admin_delete_user" )
     * @Method({"GET", "POST"})
     * @param Administrateur $administrateur
     * @return RedirectResponse
     */

    public function deleteUserAction(Administrateur $administrateur)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($administrateur);
        $em->flush();
                
        return $this->redirect($this->generateUrl('admin_liste_user'));
    }

    /**
     * @Route("/liste-user/", name="admin_liste_user" )
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */
    public function listeUserAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AyigiPlateFormeBundle:Administrateur')->findAll();

        if ($users != null)
        {
            return $this->render('AyigiPlateFormeBundle:Admin:listeUser.html.twig', array(
                'users'  => $users,
                ));             
        }
        else
        {
            return $this->redirect($this->generateUrl('admin_homepage'));
        }
    }

//------------------------- End manage plateforme users ----------------------------------------------------

//--------------------- Manage country --------------------------------------------------------------
    /**
     * @Route("/create-country/", name="admin_create_country" )
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */
    public function createCountryAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $country = new PaysDestination();

        $form = $this->createForm(PaysDestinationType::class, $country);


        if($form->handleRequest($request)&& $form->isValid())
        {
            $country= $form->getData();

            $em->persist($country);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_country'));
        }

        return $this->render('AyigiPlateFormeBundle:Admin:createCountry.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    /**
     * @Route("/update-country/{id}", name="admin_update_country" )
     * @Method({"GET", "POST"})
     * @param PaysDestination $country
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateCountryAction(PaysDestination $country, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $form = $this->createForm(PaysDestinationType::class, $country);

        if($form->handleRequest($request)&& $form->isValid())
        {
            $em->persist($country);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_country'));
        }

        return $this->render('AyigiPlateFormeBundle:Admin:updateCountry.html.twig', array(
            'form' => $form->createView(),
            'country' => $country,
            ));
    }

    /**
     * @Route("/delete-country/{id}", name="admin_delete_country" )
     * @Method({"GET", "POST"})
     * @param PaysDestination $country
     * @return RedirectResponse
     */

    public function deleteCountryAction(PaysDestination $country)
    {
        $em = $this->getDoctrine()->getManager();

        if ($country != null)
        {
            $em->remove($country);
            $em->flush();
                
            return $this->redirect($this->generateUrl('admin_liste_country'));
        }
        
        return $this->redirect($this->generateUrl('admin_homepage'));
    }

    /**
     * @Route("/liste-country/", name="admin_liste_country" )
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */
    public function listeCountryAction()
    {
        $em = $this->getDoctrine()->getManager();

        $countries = $em->getRepository('AyigiPlateFormeBundle:PaysDestination')->findAll();

        if ($countries)
        {
            return $this->render('AyigiPlateFormeBundle:Admin:listeCountry.html.twig', array(
                'countries'  => $countries,
                ));             
        }
        else
        {
            return $this->redirect($this->generateUrl('admin_homepage'));
        }
    }

//------------------------- End manage country ----------------------------------------------------




//--------------------- Manage Etablissement --------------------------------------------------------------

    /**
     * @Route("/create-etablissement/", name="admin_create_etablissement" )
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */
    public function createEtablissementAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $etablissement = new Etablissement();

        $form = $this->createForm(EtablissementType::class, $etablissement);


        if($form->handleRequest($request) && $form->isValid())
        {
            $em->persist($etablissement);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_etablissement'));

        }
        return $this->render('AyigiPlateFormeBundle:Admin:createEtablissement.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    /**
     * @Route("/update-etablissement/{id}", name="admin_update_etablissement" )
     * @Method({"GET", "POST"})
     * @param Etablissement $etablissement
     * @param Request $request
     * @return RedirectResponse
     */

    public function updateEtablissementAction(Etablissement $etablissement, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(EtablissementType::class, $etablissement);

        if($form->handleRequest($request) && $form->isValid())
        {
            $em->persist($etablissement);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_etablissement'));

        }
        return $this->render('AyigiPlateFormeBundle:Admin:updateEtablissement.html.twig', array(
            'form' => $form->createView(),
            'etablissement' => $etablissement,
            ));
    }
    /**
     * @Route("/delete-etablissement/{id}", name="admin_delete_etablissement" )
     * @Method({"GET", "POST"})
     * @param Etablissement $etablissement
     * @return RedirectResponse
     */
    public function deleteEtablissementAction(Etablissement $etablissement)
    {
        $em = $this->getDoctrine()->getManager();

        if ($etablissement != null)
        {
            $em->remove($etablissement);
            $em->flush();
                
            return $this->redirect($this->generateUrl('admin_liste_etablissement'));
        }
        
        return $this->redirect($this->generateUrl('admin_homepage'));
    }
    /**
     * @Route("/liste-etablissement/", name="admin_liste_etablissement" )
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */
    public function listeEtablissementAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etablissements = $em->getRepository('AyigiEtablissementBundle:Etablissement')->findAll();

        if ($etablissements != null)
        {
            return $this->render('AyigiPlateFormeBundle:Admin:listeEtablissement.html.twig', array(
                'etablissements'  => $etablissements,
                ));             
        }
        else
        {
            return $this->redirect($this->generateUrl('admin_homepage'));
        }
    }

//------------------------- End manage Etablissement ----------------------------------------------------


//--------------------- Manage Service --------------------------------------------------------------
    /**
     * @Route("/create-service/", name="admin_create_service" )
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */

    public function createServiceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $service = new Service();

        $form = $this->createForm(ServiceType::class, $service);

        if($form->handleRequest($request) && $form->isValid())
        {
            $em->persist($service);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_service'));

        }
        return $this->render('AyigiPlateFormeBundle:Admin:createService.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    /**
     * @Route("/update-service/{id}", name="admin_update_service" )
     * @Method({"GET", "POST"})
     * @param Service $service
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateServiceAction(Service $service, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ServiceType::class, $service);

        if($form->handleRequest($request) && $form->isValid())
        {
            $em->persist($service);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_service'));

        }
        return $this->render('AyigiPlateFormeBundle:Admin:updateService.html.twig', array(
            'form' => $form->createView(),
            'service' => $service,
            ));
    }
    /**
     * @Route("/delete-service/{id}", name="admin_delete_service" )
     * @Method({"GET", "POST"})
     * @param Service $service
     * @return RedirectResponse
     */
    public function deleteServiceAction(Service $service)
    {
        $em = $this->getDoctrine()->getManager();

        if ($service != null)
        {
            $em->remove($service);
            $em->flush();
                
            return $this->redirect($this->generateUrl('admin_liste_service'));
        }
        
        return $this->redirect($this->generateUrl('admin_homepage'));
    }

    /**
     * @Route("/liste-service/", name="admin_liste_service" )
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */

    public function listeServiceAction()
    {
        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('AyigiPlateFormeBundle:Service')->findAll();

        if ($services)
        {
            return $this->render('AyigiPlateFormeBundle:Admin:listeService.html.twig', array(
                'services'  => $services,
                ));             
        }
        else
        {
            return $this->redirect($this->generateUrl('admin_homepage'));
        }
    }

//------------------------- End manage Service ----------------------------------------------------

//----------------------- Manage Client --------------------

    /**
     * @Route("/liste-client/", name="admin_liste_client")
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */
    public function listeClientAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('AyigiClientBundle:Client')->findAll();

        if ($clients != null)
        {
            return $this->render('AyigiPlateFormeBundle:Admin:listeClient.html.twig', array(
                'clients'  => $clients,
            ));
        }
        else
        {
            return $this->redirect($this->generateUrl('admin_homepage'));
        }
    }

    /**
     * @Route("/update-client/{id}", name="admin_update_client")
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */
    public function updateClientAction(Client $client, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ClientType::class, $client);


        if($form->handleRequest($request) && $form->isValid())
        {
            $em->persist($client);

            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_client'));

        }
        return $this->render('AyigiPlateFormeBundle:Admin:updateClient.html.twig', array(
            'form' => $form->createView(),
            'clientUser' => $client,
        ));
    }

    /**
     * @Route("/delete-client/{id}", name="admin_delete_client" )
     * @Method({"GET", "POST"})
     * @param Client $client
     * @return RedirectResponse
     */

    public function deleteClientAction(Client $client)
    {
        $em = $this->getDoctrine()->getManager();

        if ($client!= null)
        {
            $em->remove($client);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_liste_client'));
        }

        return $this->redirect($this->generateUrl('admin_homepage'));
    }

}//End controler