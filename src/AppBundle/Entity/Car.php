<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarRepository")
 */
class Car
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
     * @ORM\Column(name="make", type="string", length=255)
     */
    private $make;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var int
     *
     * @ORM\Column(name="consumption", type="integer")
     */
    private $consumption;

    /**
     * @var int
     *
     * @ORM\Column(name="km", type="integer")
     */
    private $km;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastTechInspection", type="datetime")
     */
    private $lastTechInspection;

    /**
     * @var int
     *
     * @ORM\Column(name="priceTechInspection", type="integer")
     */
    private $priceTechInspection;



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
     * Set make
     *
     * @param string $make
     *
     * @return Car
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set consumption
     *
     * @param integer $consumption
     *
     * @return Car
     */
    public function setConsumption($consumption)
    {
        $this->consumption = $consumption;

        return $this;
    }

    /**
     * Get consumption
     *
     * @return int
     */
    public function getConsumption()
    {
        return $this->consumption;
    }

    /**
     * Set km
     *
     * @param integer $km
     *
     * @return Car
     */
    public function setKm($km)
    {
        $this->km = $km;

        return $this;
    }

    /**
     * Get km
     *
     * @return int
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * Set lastTechInspection
     *
     * @param \DateTime $lastTechInspection
     *
     * @return Car
     */
    public function setLastTechInspection($lastTechInspection)
    {
        $this->lastTechInspection = $lastTechInspection;

        return $this;
    }

    /**
     * Get lastTechInspection
     *
     * @return \DateTime
     */
    public function getLastTechInspection()
    {
        return $this->lastTechInspection;
    }

    /**
     * Set priceTechInspection
     *
     * @param integer $priceTechInspection
     *
     * @return Car
     */
    public function setPriceTechInspection($priceTechInspection)
    {
        $this->priceTechInspection = $priceTechInspection;

        return $this;
    }

    /**
     * Get priceTechInspection
     *
     * @return int
     */
    public function getPriceTechInspection()
    {
        return $this->priceTechInspection;
    }
}

