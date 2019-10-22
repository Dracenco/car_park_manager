<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Costs;
use AppBundle\Entity\Payment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    /**
     * @Route("/newPayment")
     */
    public function newPaymentAction()
    {
		$em = $this->getDoctrine()->getManager();

		if (!$costs = $em->getRepository(Costs::class)->findByStatus("new"))
		{
			return $this->render("@App/Payment/complete_payment.html.twig");
		}
		$action = true;
		if ($action === true ){

			foreach($costs as $cost)
			{
			$payment = new Payment();
			$payment->setSum($cost->getFuelCosts() + $cost->getTechInspectionCosts());
			$cost->setStatus("paid");
			$cost->setPayment($payment);
			$em->persist($payment);
			$em->persist($cost);
			}
			$em->flush();
			return $this->render("@App/Payment/new_payment.html.twig");
		}
		return new Response("payment declined");
    }

}
