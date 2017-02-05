<?php

namespace Ayigi\PlateFormeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TarifService
 *
 * @ORM\Table(name="tarif_service")
 * @ORM\Entity(repositoryClass="Ayigi\PlateFormeBundle\Repository\TarifServiceRepository")
 */
class TarifService
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
    * @ORM\OneToOne(targetEntity="Ayigi\PlateFormeBundle\Entity\Service", cascade={"persist"})
    */
    private $service;

    /**
    * @ORM\OneToOne(targetEntity="Ayigi\EtablissementBundle\Entity\Etablissement", cascade={"persist"})
    */
    private $etablissement;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;


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
     * Set montant
     *
     * @param float $montant
     *
     * @return TarifService
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set service
     *
     * @param \Ayigi\PlateFormeBundle\Entity\Service $service
     *
     * @return TarifService
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
     * Set etablissement
     *
     * @param \Ayigi\EtablissementBundle\Entity\Etablissement $etablissement
     *
     * @return TarifService
     */
    public function setEtablissement(\Ayigi\EtablissementBundle\Entity\Etablissement $etablissement = null)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement
     *
     * @return \Ayigi\EtablissementBundle\Entity\Etablissement
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }
}
