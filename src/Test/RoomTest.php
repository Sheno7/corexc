<?php

namespace Corexc\Test;
use Corexc\Service\Advertiser1;
use Corexc\Service\Advertiser2;
use Corexc\Service\Advertiser3;
use Corexc\Service\DataCenter;
use GuzzleHttp\Client;

class RoomTest extends TestCase
{

    public function testProviderAdvertiser1(){
        $dataCenter=new DataCenter();
        $dataCenter->addProvider(new Advertiser1());
        $this->assertIsArray($dataCenter->getData());
        $this->assertNotEmpty($dataCenter->getData());
    }

    public function testProviderAdvertiser2(){
        $dataCenter=new DataCenter();
        $dataCenter->addProvider(new Advertiser2());
        $this->assertIsArray($dataCenter->getData());
        $this->assertNotEmpty($dataCenter->getData());
    }

    public function testProviderAdvertiser3(){
        $dataCenter=new DataCenter();
        $dataCenter->addProvider(new Advertiser3());
        $this->assertIsArray($dataCenter->getData());
        $this->assertNotEmpty($dataCenter->getData());
    }
    public function testApi(){
        $response=$this->get('rooms');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
    }
}