<?php

namespace Ayigi\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaiementDone
 *
 * @ORM\Table(name="paiement_done")
 * @ORM\Entity(repositoryClass="Ayigi\ClientBundle\Repository\PaiementDoneRepository")
 */
class PaiementDone
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="Ayigi\ClientBundle\Entity\Client", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true, onDelete="SET NULL")
    */
    private $client;

    /**
    * @ORM\ManyToOne(targetEntity="Ayigi\PlateFormeBundle\Entity\Service", cascade={"persist"})
    */
    private $service;

    /**
    * @ORM\ManyToOne(targetEntity="Ayigi\PlateFormeBundle\Entity\PaysDestination", cascade={"persist"})
    */
    private $paysDestination;

    /**
    * @ORM\ManyToOne(targetEntity="Ayigi\EtablissementBundle\Entity\Etablissement", cascade={"persist"})
    */
    private $etablissements;

    /**
    * @ORM\ManyToOne(targetEntity="Ayigi\ClientBundle\Entity\devise", cascade={"persist"})
    */
    private $devise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepaiement", type="date", nullable=true)
     */
    private $datepaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="integer", nullable=true)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="montantrecu", type="float", nullable=true)
     */
    private $montantrecu;


    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", nullable=true)
     */
    private $message;

    /**
    *
    * @var boolean
    * @ORM\Column(name="etat", type="boolean", nullable=true)
    */
    private $etat;


    public function __construct()
    {
        $this->datepaiement = new \DateTime();
        $this->etat=false;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set client
     *
     * @param \Ayigi\ClientBundle\Entity\Client $client
     *
     * @return PaiementDone
     */
    public function setClient(\Ayigi\ClientBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Ayigi\ClientBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set service
     *
     * @param \Ayigi\PlateFormeBundle\Entity\Service $service
     *
     * @return PaiementDone
     */
    public function setService(\Ayigi\PlateFormeBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Ayigi\PlateFormeBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }


    /**
     * Set paysDestination
     *
     * @param \Ayigi\PlateFormeBundle\Entity\PaysDestination $paysDestination
     *
     * @return PaiementDone
     */
    public function setPaysDestination(\Ayigi\PlateFormeBundle\Entity\PaysDestination $paysDestination = null)
    {
        $this->paysDestination = $paysDestination;

        return $this;
    }

    /**
     * Get paysDestination
     *
     * @return \Ayigi\PlateFormeBundle\Entity\PaysDestination
     */
    public function getPaysDestination()
    {
        return $this->paysDestination;
    }

    /**
     * Set etablissements
     *
     * @param \Ayigi\EtablissementBundle\Entity\Etablissement $etablissements
     *
     * @return PaiementDone
     */
    public function setEtablissements(\Ayigi\EtablissementBundle\Entity\Etablissement $etablissements = null)
    {
        $this->etablissements = $etablissements;

        return $this;
    }

    /**
     * Get etablissements
     *
     * @return \Ayigi\EtablissementBundle\Entity\Etablissement
     */
    public function getEtablissements()
    {
        return $this->etablissements;
    }

    /**
     * Set devise
     *
     * @param \Ayigi\ClientBundle\Entity\devise $devise
     *
     * @return PaiementDone
     */
    public function setDevise(\Ayigi\ClientBundle\Entity\devise $devise = null)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get devise
     *
     * @return \Ayigi\ClientBundle\Entity\devise
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set datepaiement
     *
     * @param \DateTime $datepaiement
     *
     * @return PaiementDone
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;

        return $this;
    }

    /**
     * Get datepaiement
     *
     * @return \DateTime
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return PaiementDone
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return PaiementDone
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return PaiementDone
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return PaiementDone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return PaiementDone
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return PaiementDone
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set montantrecu
     *
     * @param float $montantrecu
     *
     * @return PaiementDone
     */
    public function setMontantrecu($montantrecu)
    {
        $this->montantrecu = $montantrecu;

        return $this;
    }

    /**
     * Get montantrecu
     *
     * @return float
     */
    public function getMontantrecu()
    {
        return $this->montantrecu;
    }
}
