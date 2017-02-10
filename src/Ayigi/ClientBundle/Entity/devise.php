<?php

namespace Ayigi\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * devise
 *
 * @ORM\Table(name="devise")
 * @ORM\Entity(repositoryClass="Ayigi\ClientBundle\Repository\deviseRepository")
 */
class devise
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="full_name", type="string", length=255, nullable=true)
     */
    private $fullName = null;

    /**
     * @var float
     *
     * @ORM\Column(name="taux", type="float", nullable=true)
     */
    private $taux;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return devise
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
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return float
     */
    public function getTaux()
    {
        return $this->taux;
    }

    /**
     * @param float $taux
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;
    }
}

