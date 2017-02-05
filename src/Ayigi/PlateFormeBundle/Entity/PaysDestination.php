<?php

namespace Ayigi\PlateFormeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaysDestination
 *
 * @ORM\Table(name="pays_destination")
 * @ORM\Entity(repositoryClass="Ayigi\PlateFormeBundle\Repository\PaysDestinationRepository")
 */
class PaysDestination
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
     * @var string
     *
     * @ORM\Column(name="continent", type="string", length=255)
     */
    private $continent;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="codepostal", type="integer")
     */
    private $codepostal;


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
     * Set continent
     *
     * @param string $continent
     *
     * @return PaysDestination
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return string
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return PaysDestination
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
     * Set codepostal
     *
     * @param integer $codepostal
     *
     * @return PaysDestination
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return int
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }
}

