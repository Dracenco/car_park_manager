<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CostControllerTest extends WebTestCase
{
    public function testImportfuelcost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/importFuelCost');
    }

    public function testImportservicecost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/importServiceCost');
    }

    public function testImportinspectioncost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/importInspectionCost');
    }

}
