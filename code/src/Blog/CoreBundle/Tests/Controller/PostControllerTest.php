<?php

namespace Blog\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'http://127.0.0.1/');
        $this->assertTrue($client->getResponse()->isSuccessful(), 'The response was not successful');
        $this->assertCount(2, $crawler->filter('h2'), 'There should be 3 displayed posts');
    }

}
