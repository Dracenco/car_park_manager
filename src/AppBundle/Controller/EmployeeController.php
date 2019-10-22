<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Employee;
use AppBundle\Form\EmployeeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * @Route("/newEmployee")
	 * @Method("GET")
     */
    public function newEmployeeAction()
    {
		$employee = new Employee();
		$form = $this->createForm(EmployeeType::class,$employee);

		return $this->render('@App/Employee/new_employee.html.twig', array("form" => $form->createView()
		));
    }

    /**
     * @Route("/newEmployee")
	 * @Method("POST")
     */
    public function addEmployeeAction(Request $req)
    {
		$employee = new Employee();
		$form = $this->createForm(EmployeeType::class,$employee);
		$form->handleRequest($req);
		if ($form->isValid() && $form->isSubmitted()){
			$employee = $form->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($employee);
			$em->flush();
			return $this->render("@App/Employee/add_employee.html.twig");
		}
		return $this->render('@App/Employee/new_employee.html.twig', array("form" => $form->createView()
		));
    }


	/**
	 * @Route("/updateEmployee/{id}")
	 * @Method("GET")
	 */
	public function newUpdateCarAction($id)
	{

		$em = $this->getDoctrine()->getManager();
		$employee = $em->getRepository(Employee::class)->findOneById($id);
		$form =$this->createForm(EmployeeType::class,$employee);
		return $this->render('@App/Employee/update_employee.html.twig', array("form"=>$form->createView(),"id"=>$id));
	}
    /**
     * @Route("/updateEmployee/{id}",name="updateemployee")
	 * @Method({"GET","POST"})
     */
    public function updateEmployeeAction(Request $req,$id)
    {
		$em = $this->getDoctrine()->getManager();
		$employee = $em->getRepository(Employee::class)->findOneById($id);
		$form = $this->createForm(EmployeeType::class,$employee);
		$form->handleRequest($req);
		if ($form->isValid() && $form->isSubmitted()){
			$employee = $form->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($employee);
			$em->flush();
			return $this->render('@App/Employee/updateemployee.html.twig');
		}
		return $this->render('@App/Employee/update_employee.html.twig', array("form"=>$form->createView(),"id"=>$id));
    }

    /**
     * @Route("/deleteEmployee/{id}",name="deleteemployee")
     */
    public function deleteEmployeeAction($id)
    {
		$em = $this->getDoctrine()->getManager();
		$employee = $em->getRepository(Employee::class)->findOneById($id);
		$em->remove($employee);
		$em->flush();
		$this->addFlash("succes","Employee Deleted");
		return $this->render('@App/Employee/delete_employee.html.twig');
    }

    /**
     * @Route("/viewEmployee/{id}",name="viewemployee")
     */
    public function viewEmployeeAction($id)
    {
		$em = $this->getDoctrine()->getManager();
		$employee = $em->getRepository(Employee::class)->findOneById($id);

		return $this->render('@App/Employee/view_employee.html.twig', array(
			"employee"=>$employee
		));
    }

    /**
     * @Route("/viewAllEmployees",name="viewallemployees")
     */
    public function viewAllEmployeesAction()
    {
		$em = $this->getDoctrine()->getManager();
		$employee = $em->getRepository(Employee::class)->findAll();

		return $this->render('@App/Employee/view_all_employees.html.twig', array(
			"employees"=>$employee
		));
    }

}
