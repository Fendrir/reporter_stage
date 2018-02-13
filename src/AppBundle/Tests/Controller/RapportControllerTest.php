<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RapportControllerTest extends WebTestCase
{
    public function testAfficherrap()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rapport');
    }

}
