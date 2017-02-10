<?php

namespace Ayigi\ClientBundle\Controller;

use Ayigi\PlateFormeBundle\Entity\PaysDestination;
use Ayigi\PlateFormeBundle\Entity\Service;
use Ayigi\PlateFormeBundle\Entity\TarifService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Ayigi\ClientBundle\Entity\Client;
use Ayigi\ClientBundle\Form\ClientType;
use Ayigi\ClientBundle\Entity\PaiementDone;
use Ayigi\ClientBundle\Form\PaiementDoneType;
use Ayigi\EtablissementBundle\Entity\Etablissement;

/**
 * Controller de Front Office
 * @Route("/espace-client")
 * @Security("is_granted('ROLE_CLIENT')")
 */
class ClientController extends Controller
{
    private $apiUrl = 'http://free.currencyconverterapi.com/api/v3/convert?q=[params]&compact=y';
    /**
     * @Route("/", name="client_homepage" )
     * @Method({"GET", "POST"})
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction()
    {
        $client = $this->getUser();
        if (!$client) {
            $this->redirectToRoute("client_login");
        }
//        $form = $this - $this->createForm(ClientType::class, $client);
        return $this->redirectToRoute('client_historique_user', array(
            'client' => $client->getId(),
        ));
    }

    /**
     * @Route("/fraisService/{etablissement}/{service}", name="client_frais_service" )
     * @Method({"GET", "POST"})
     * @param Etablissement $etablissement
     * @param Service $service
     * @return JsonResponse
     */
    public function getFraisForService(Etablissement $etablissement = null, Service $service = null)
    {
        $em = $this->getDoctrine()->getManager();
        $montantFrais = $em->getRepository(TarifService::class)->getFaisMontant($etablissement, $service);
        return new JsonResponse($montantFrais);
    }

    /**
     * @Route("/update-compte/{id}", name="client_update_compte")
     * @Method({"GET", "POST"})
     * @param Client $client
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateUserAction(Client $client, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this - $this->createForm(ClientType::class, $client);
        if ($form->handleRequest($request) && $form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('client_homepage'));
        }

        return $this->render('AyigiClientBundle:Client:updateUser.html.twig', array(
            'form' => $form->createView(),
            'client' => $client,
        ));
    }

    /**
     * @Route("/choix-pays-etablissement/", name="client_etablisssement_choice")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return RedirectResponse
     */
    public function choixPaysEtablissementAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $etablissements = new Etablissement();

        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $idPays = $request->request->get('id');

            $pays = $em->getRepository('AyigiPlateFormeBundle:PaysDestination')->find($idPays);

            $selecteur = $request->request->get('select');

            if ($pays != null) {
                $data = $em->getRepository('AyigiEtablissementBundle:Etablissement')->EtablissementPays($idPays);

                //$data = json_encode($etablissements);
                return new JsonResponse($data);
            }
        }
        return new Response("Nonnn ....");;
    }

    /**
     * @Route("/choix-etablissement-service/", name="client_choice_service_etablisssement")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return RedirectResponse
     */
    public function choixEtablissementServiceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $idEtablissement = $request->request->get('id');
            $selecteur = $request->request->get('select');

            if ($idEtablissement != null) {
                $data = $em->getRepository('AyigiPlateFormeBundle:Service')->ServiceEtablissement($idEtablissement);

                //$data = json_encode($etablissements);
                return new JsonResponse($data);
            }
        }
        return new Response("Nonnn ....");;
    }

    /**
     * @Route("/historique-de-mon-compte/{client}", name="client_historique_user")
     * @Method({"GET", "POST"})
     * @param Client $client
     * @return RedirectResponse
     */
    public function historiqueUserAction(Client $client)
    {
        $em = $this->getDoctrine()->getManager();

        $listePaiements = new PaiementDone();

        $allPays = $em->getRepository('AyigiPlateFormeBundle:PaysDestination')->findAll();
        $allServices = $em->getRepository('AyigiPlateFormeBundle:Service')->findAll();


        if ($client != null) {
            $listePaiements = $em->getRepository('AyigiClientBundle:PaiementDone')->findClientPaiement($client->getId());

            if ($listePaiements != null) {
                return $this->render('AyigiClientBundle:Client:historiqueUser.html.twig', array(
                    'client' => $client,
                    'paiements' => $listePaiements,
                ));
            } else {
                return $this->redirect($this->generateUrl('client_paiement_user', array(
                    'client' => $client->getId(),
                )));
            }

        }

        return $this->render('AyigiClientBundle:Client:historiqueUser.html.twig', array(
            'client' => $client,
            'paiements' => $listePaiements,
        ));
    }

    /**
     * @Route("/paiement-service/{client}", name="client_paiement_user")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Client $client
     * @return RedirectResponse
     */
    public function paiementServiceAction(Request $request, Client $client)
    {
        $em = $this->getDoctrine()->getManager();

        $paiement = new PaiementDone();
        $listedesdevises = $em->getRepository('AyigiClientBundle:devise')->findAll();

        $montantPayer = null;

        $form = $this->createForm(PaiementDoneType::class, $paiement, ['em' => $em]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$devise = $request->request->get('choixdevise');

            $paiement = $form->getData();

            $paiement->setClient($client);
            //$paiement->SetDevise($devise);

            $montantPayer = $paiement->getMontant();
            if ($montantPayer != null) {
                $paiement->SetEtat(true);
            }

            $em->persist($paiement);
            $em->flush();

            return $this->redirect($this->generateUrl('client_finaliser_paiement_user_carte_bancaire', array(
                'paiement' => $paiement->getId(),
            )));
        }

        return $this->render('AyigiClientBundle:Client:paiementService.html.twig', array(
            'client' => $client,
            'form' => $form->createView(),
            'listedesdevises' => $listedesdevises,
        ));
    }

    /**
     * @Route("/finaliser-paiement-carte-bancaire/{paiement}", name="client_finaliser_paiement_user_carte_bancaire")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param PaiementDone $paiement
     * @return RedirectResponse
     */

    public function FinaliserPaiementServiceCarteBancaireAction(Request $request, PaiementDone $paiement)
    {
        $em = $this->getDoctrine()->getManager();

        $client = $paiement->getClient();

        $form = $this->createForm(PaiementDoneType::class, $paiement, ['em' =>$em]);

        if ($form->handleRequest($request) && $form->isValid()) {

            $paiement = $form->getData();

            $em->persist($paiement);
            $em->flush();

            return $this->redirect($this->generateUrl('client_historique_user', array(
                'client' => $paiement->getClient()->getId(),
            )));
        }

        return $this->render('AyigiClientBundle:Client:FinaliserPaiementServiceCarteBancaire.html.twig', array(
            'form' => $form->createView(),
            'paiement' => $paiement,
            'client' => $client,
        ));
    }//fin finaliser paiement par carte bancaire


    /**
     * @Route("/validate-info-generales/", name="client_validate_info_generales_user")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function validateInfoGeneralesPaiementServiceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $paiement = new PaiementDone();

        if ($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $idPays = $request->request->get('pays');
            $fromDevise = $request->request->get('fromDevise', null);
            $idEtablissement = $request->request->get('etablissement');
            $idService = $request->request->get('service');
            $message = $request->request->get('message');
            $nomDestinataire = $request->request->get('nomDestinataire');
            $prenomDestinataire = $request->request->get('prenomDestinataire');
            $telephoneDestinataire = $request->request->get('telephoneDestinataire');
            /** @var PaysDestination $pays */
            $pays = $em->getRepository('AyigiPlateFormeBundle:PaysDestination')->find($idPays);
            $service = $em->getRepository('AyigiPlateFormeBundle:Service')->find($idService);

            if ($pays != null) {
                $paiement->setPaysDestination($pays);
            }

            if ($service != null) {
                $paiement->setService($service);
            }

            if ($nomDestinataire != null) {
                $paiement->setNom($nomDestinataire);
            }

            if ($prenomDestinataire != null) {
                $paiement->setPrenom($prenomDestinataire);
            }

            if ($telephoneDestinataire != null) {
                $paiement->setTelephone($telephoneDestinataire);
            }

            if ($message != null) {
                $paiement->setMessage($message);
            }

            $em->persist($paiement);
            $em->flush();

            $data['name'] = $pays->getNom();
            $data['devise'] = $pays->getDevise()->getNom();
            if ($fromDevise !== null) {
                $tauxEx = $this->convertFromTo($fromDevise, $pays->getDevise()->getNom());
                $data['tauxEchange'] = array_values(json_decode($tauxEx, true))[0]['val'];
                dump($data);
            }
            //$data = json_encode($etablissements);
            return new JsonResponse($data);

        }
        return new JsonResponse("Erreur de validation des informations générales");
    }

    //fin validate infos générales

    /**
     * @Route("/reprise-paiement-service/{paiement}", name="client_reprise_paiement_user")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param PaiementDone $paiement
     * @return RedirectResponse
     */
    public function reprisePaiementServiceAction(Request $request, PaiementDone $paiement)
    {
        $em = $this->getDoctrine()->getManager();

        $client = $paiement->getClient();
        $listedesdevises = $em->getRepository('AyigiClientBundle:devise')->findAll();

        $montantPayer = null;

        $form = $this->createForm(PaiementDoneType::class, $paiement, ['em' => $em]);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            $paiement = $form->getData();

            $montantPayer = $paiement->getMontant();
            if ($montantPayer != null) {
                $paiement->SetEtat(true);
            }

            $em->persist($paiement);
            $em->flush();

            return $this->redirect($this->generateUrl('client_historique_user', array(
                'client' => $paiement->getClient()->getId(),
            )));
        }

        return $this->render('AyigiClientBundle:Client:paiementService.html.twig', array(
            'client' => $client,
            'form' => $form->createView(),
            'listedesdevises' => $listedesdevises,
        ));
    }


    /**
     * @Route("/voir-le-detail-de-son-compte/{id}", name="client_view_user")
     * @Method({"GET", "POST"})
     * @param Client $client
     * @return RedirectResponse
     */

    public function viewUserAction(Client $client)
    {
        if ($client != null) {
            return $this->render('AyigiClientBundle:Client:viewUser.html.twig', array(
                'user' => $client,
            ));
        }

        return $this->redirect($this->generateUrl('client_homepage'));
    }

    /**
     * @Route("/liste-service/", name="client_liste_service")
     * @Method({"GET", "POST"})
     * @return RedirectResponse
     */
    public function listeServiceAction()
    {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository('AyigiPlateFormeBundle:Service')->findAll();

        if ($services != null) {
            return $this->render('AyigiClientBundle:Client:listeService.html.twig', array(
                'services' => $services,
            ));
        } else {
            return $this->redirect($this->generateUrl('client_homepage'));
        }
    }

    /**
     * @param string $from
     * @param string $to
     * @return mixed
     */
    private function convertFromTo(string $from = 'EUR', string $to = 'EUR')
    {
        dump($from);
        $queryParameter = $from . '_' . $to;
        $url = str_replace('[params]', $queryParameter, $this->apiUrl);
        dump($url);
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;

    }
}
