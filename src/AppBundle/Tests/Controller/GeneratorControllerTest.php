<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GeneratorControllerTest extends WebTestCase
{
    public function testSize()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/size');
    }

}
