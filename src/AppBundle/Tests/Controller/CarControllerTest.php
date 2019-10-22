<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CarControllerTest extends WebTestCase
{
    public function testNewcar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newCar');
    }

    public function testAddcar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addCar');
    }

    public function testUpdatecar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateCar');
    }

    public function testDeletecar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteCar');
    }

    public function testViewcar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/viewCar');
    }

    public function testViewallcars()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/viewAllCars');
    }

}
