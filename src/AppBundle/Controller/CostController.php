<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Car;
use AppBundle\Entity\Costs;
use AppBundle\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;


class CostController extends Controller
{


    /**
     * @Route("/importCosts")
     */
    public function importFuelCostAction()
    {
		$em = $this->getDoctrine()->getManager();

		$employees = $em->getRepository(Employee::class)->findAll();

		foreach ($employees as $employee)
		{
		$kmLimit = $employee->getKmLimit();
		$consumption = $employee->getCar()->getConsumption();
		$fuelCost = ($kmLimit / 100) * $consumption *5.87;

		$techInspection = $employee->getCar()->getLastTechInspection();
		$lastYear = new \DateTime("-1 year");


		$cost = new Costs();
		if($techInspection < $lastYear){
			$techCost = $employee->getCar()->getPriceTechInspection();
			$cost->setTechInspectionCosts($techCost);
		}
		$currentTime = new \DateTime();
		$cost->setFuelCosts($fuelCost);
		$cost->setCreatedAt($currentTime);
		$cost->setUpdatedAt($currentTime);
		$cost->setStatus("new");
		$cost->setEmployee($employee);
		$em->persist($cost);
		}
		$em->flush();

		return $this->render("@App/Cost/import_fuel_cost.html.twig");
	}
}
