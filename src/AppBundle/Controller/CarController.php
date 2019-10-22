<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Car;
use AppBundle\Form\CarType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{

	/**
	 * @Route("/")
	 */

	public function indexAction()
	{
		dump('aaa');
	return $this->render("@App/Car/base.html.twig");
	}
    /**
     * @Route("/newCar")
	 * @Method("GET")
     */
    public function newCarAction()
    {
		$car = new Car();
		$form = $this->createForm(CarType::class,$car);
		return $this->render('@App/Car/new_car.html.twig', array("form" => $form->createView()
		));
    }

    /**
     * @Route("/newCar")
	 * @Method("POST")
     */
    public function addCarAction(Request $req)
    {
		$car = new Car();
		$form = $this->createForm(CarType::class,$car);
		$form->handleRequest($req);
		if ($form->isValid() && $form->isSubmitted()){
			$vehicle = $form->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($vehicle);
			$em->flush();
			return $this->render("@App/car/newcarsuccess.html.twig");
		}
		return $this->render('@App/CAR/new_car.html.twig', array("form" => $form->createView()
		));
    }

    /**
     * @Route("/updateCar")
	 * @Method("GET")
     */
    public function newUpdateCarAction()
    {

		$em = $this->getDoctrine()->getManager();
		$cars = $em->getRepository(Car::class)->findAll();

		return $this->render('@App/Car/viewcarsupdate.html.twig', array(
			"cars"=>$cars
		));
    }


    /**
     * @Route("/updateCar/{id}",name="updatecar")
	 * @Method({"GET","POST"})
     */
    public function updateCarAction(Request $req,$id)
    {
		$em = $this->getDoctrine()->getManager();
		$car = $em->getRepository(Car::class)->findOneById($id);
		$form = $this->createForm(CarType::class,$car);
		$form->handleRequest($req);
		if ($form->isValid() && $form->isSubmitted()){
			$vehicle = $form->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($vehicle);
			$em->flush();
			return $this->render('@App/Car/updatesuccess.html.twig',["car"=>$car,"id"=>$id]);
		}
		return $this->render('@App/CAR/update_car.html.twig', array("form"=>$form->createView(),"id"=>$id));
    }

    /**
     * @Route("/deleteCar/{id}",name="deletecar")
     */
    public function deleteCarAction($id)
    {
		$em = $this->getDoctrine()->getManager();
		$car = $em->getRepository(Car::class)->findOneById($id);
		$em->remove($car);
		$em->flush();
		$this->addFlash("succes","Car Deleted");
		return $this->render('@App/car/delete_car.html.twig');
    }

    /**
     * @Route("/viewCar/{id}",name="viewcar")
     */
    public function viewCarAction($id)
    {
		$em = $this->getDoctrine()->getManager();
		$car = $em->getRepository(Car::class)->findOneById($id);

		return $this->render('@App/Car/view_car.html.twig', array(
			"car"=>$car
		));
    }

    /**
     * @Route("/viewAllCars",name="viewallcars")
     */
    public function viewAllCarsAction()
    {
		$em = $this->getDoctrine()->getManager();
		$cars = $em->getRepository(Car::class)->findAll();

		return $this->render('@App/Car/view_all_cars.html.twig', array(
			"cars"=>$cars
		));
    }

}
