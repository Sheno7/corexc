<?php


namespace Corexc\Service;


class Advertiser2 extends DataProvider
{
    public function dataSource()
    {
        return $this->getData(json_decode(file_get_contents('https://f704cb9e-bf27-440c-a927-4c8e57e3bad1.mock.pstmn.io/s2/availability'),true));
    }
     public function getData($data)
     {
         $normalizedData=[];
         foreach ($data['hotels'] as $hotel){
             foreach ($hotel['rooms'] as $room){
                 $normalizedData[]=[
                    'provider'=>'ad2',
                    'hotel_name'=> $hotel['name'],
                    'hotel_star'=> $hotel['stars'],
                    'code'=> $room['code'],
                    'net_price'=> $room['net_rate'],
                    'tax'=> $room['totalPrice'] - $room['net_rate'],
                    'total_price'=>$room['totalPrice']
                 ];
             }
         }
         return $normalizedData;
     }

}