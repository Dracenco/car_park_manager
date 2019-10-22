<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PaymentControllerTest extends WebTestCase
{
    public function testNewpayment()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newPayment');
    }

    public function testCompletepayment()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/completePayment');
    }

}
