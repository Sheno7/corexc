<?php


namespace Corexc\Controller;


use Corexc\Service\Advertiser1;
use Corexc\Service\Advertiser2;
use Corexc\Service\Advertiser3;
use Corexc\Service\DataCenter;

class HotelController extends Controller
{

    public function get(){
        $dataCenter=new DataCenter();
        try {
            $dataCenter->addProvider(new Advertiser1());
        }
        catch (\Throwable $e){
            // send notification to admin "advertiser1 down"
        }
        try {
            $dataCenter->addProvider(new Advertiser2());
        }
        catch (\Throwable $e){
            // send notification to admin "advertiser2 down"
        }
        try {
            $dataCenter->addProvider(new Advertiser3());
        }
        catch (\Throwable $e){
            // send notification to admin "advertiser3 down"
        }
        $this->response->status(200)->toJson($dataCenter->getData());
    }
}