<?php


namespace Corexc\Test;

use GuzzleHttp\Client;
use \PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function get($url)
    {
        $client = new Client();
        return $client->get($this->baseUrl() . $url);
    }

    public function post($url)
    {
        $client = new Client();
        return $client->post($this->baseUrl() . $url);
    }

    private function baseUrl()
    {
        return 'http://127.0.0.1:5001/';
    }
}