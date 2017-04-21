<?php

namespace AssoSport\AccueilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activite
 *
 * @ORM\Table(name="activite")
 * @ORM\Entity(repositoryClass="AssoSport\AccueilBundle\Repository\ActiviteRepository")
 */
class Activite
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
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="Temps", type="integer")
     */
    private $temps;

    /**
     * @var int
     *
     * @ORM\Column(name="Borg", type="integer")
     */
    private $borg;

    /**
     * @var int
     *
     * @ORM\Column(name="Sensation", type="integer")
     */
    private $sensation;

    /**
     * @var int
     *
     * @ORM\Column(name="DistanceKm", type="integer")
     */
    private $distanceKm;

    /**
     * @var bool
     *
     * @ORM\Column(name="Adherent", type="boolean")
     */
    private $adherent;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Activite
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set temps
     *
     * @param integer $temps
     *
     * @return Activite
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @return int
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set borg
     *
     * @param integer $borg
     *
     * @return Activite
     */
    public function setBorg($borg)
    {
        $this->borg = $borg;

        return $this;
    }

    /**
     * Get borg
     *
     * @return int
     */
    public function getBorg()
    {
        return $this->borg;
    }

    /**
     * Set sensation
     *
     * @param integer $sensation
     *
     * @return Activite
     */
    public function setSensation($sensation)
    {
        $this->sensation = $sensation;

        return $this;
    }

    /**
     * Get sensation
     *
     * @return int
     */
    public function getSensation()
    {
        return $this->sensation;
    }

    /**
     * Set distanceKm
     *
     * @param integer $distanceKm
     *
     * @return Activite
     */
    public function setDistanceKm($distanceKm)
    {
        $this->distanceKm = $distanceKm;

        return $this;
    }

    /**
     * Get distanceKm
     *
     * @return int
     */
    public function getDistanceKm()
    {
        return $this->distanceKm;
    }

    /**
     * Set adherent
     *
     * @param boolean $adherent
     *
     * @return Activite
     */
    public function setAdherent($adherent)
    {
        $this->adherent = $adherent;

        return $this;
    }

    /**
     * Get adherent
     *
     * @return bool
     */
    public function getAdherent()
    {
        return $this->adherent;
    }
}

