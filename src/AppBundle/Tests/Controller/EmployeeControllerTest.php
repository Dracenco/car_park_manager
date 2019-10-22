<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EmployeeControllerTest extends WebTestCase
{
    public function testNewemployee()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newEmployee');
    }

    public function testAddemployee()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addEmployee');
    }

    public function testUpdateemployee()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateEmployee');
    }

    public function testDeleteemployee()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteEmployee');
    }

    public function testViewemployee()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/viewEmployee');
    }

    public function testViewallemployees()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/viewAllEmployees');
    }

}
