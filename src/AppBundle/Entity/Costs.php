<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Costs
 *
 * @ORM\Table(name="costs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CostsRepository")
 */
class Costs
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
     * @var int
     *
     * @ORM\Column(name="fuelCosts", type="integer")
     */
    private $fuelCosts;


    /**
     * @var int
     *
     * @ORM\Column(name="techInspectionCosts", type="integer")
     */
    private $techInspectionCosts;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="string")
     */
    private $status;

	/**
	 * @ORM\Column(name="createdAt", type="datetime")
	 */

	private $createdAt;

	/**
	 * @ORM\Column(name="updatedAt", type="datetime")
	 */
	private $updatedAt;


	/**
	 * @var Payment
	 *
	 * @ORM\ManyToOne(targetEntity="Payment")
	 */
	private $payment;

	/**
	 * @ORM\ManyToOne(targetEntity="Employee")
	 * @ORM\JoinColumn(name="employee_id",referencedColumnName="id")
	 */
	private $employee;

	/**
	 * @return mixed
	 */
	public function getEmployee()
	{
		return $this->employee;
	}

	/**
	 * @param mixed $employee
	 */
	public function setEmployee($employee)
	{
		$this->employee = $employee;
	}



	/**
	 * @return Payment
	 */
	public function getPayment()
	{
		return $this->payment;
	}

	/**
	 * @param Payment $payment
	 */
	public function setPayment($payment)
	{
		$this->payment = $payment;
	}



	/**
	 * @return mixed
	 */
	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}

	/**
	 * @param mixed $updatedAt
	 */
	public function setUpdatedAt($updatedAt = "not updated")
	{
		$this->updatedAt = $updatedAt;
	}



	/**
	 * @return mixed
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * @param mixed $createdAt
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;
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
     * Set fuelCosts
     *
     * @param integer $fuelCosts
     *
     * @return Costs
     */
    public function setFuelCosts($fuelCosts)
    {
        $this->fuelCosts = $fuelCosts;

        return $this;
    }

    /**
     * Get fuelCosts
     *
     * @return int
     */
    public function getFuelCosts()
    {
        return $this->fuelCosts;
    }


    /**
     * Set techInspectionCosts
     *
     * @param integer $techInspectionCosts
     *
     * @return Costs
     */
    public function setTechInspectionCosts($techInspectionCosts)
    {
        $this->techInspectionCosts = $techInspectionCosts;

        return $this;
    }

    /**
     * Get techInspectionCosts
     *
     * @return int
     */
    public function getTechInspectionCosts()
    {
        return $this->techInspectionCosts;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Costs
     */
    public function setStatus($status = "new")
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}

