<?php


namespace Corexc\Service;


class Advertiser1 extends DataProvider
{

    public function dataSource()
    {
        return $this->getData(json_decode(file_get_contents('https://f704cb9e-bf27-440c-a927-4c8e57e3bad1.mock.pstmn.io/s1/availability'),true));
    }

    public function getData($data)
    {
        $normalizedData=[];
        foreach ($data['hotels'] as $hotel){
            foreach ($hotel['rooms'] as $room){
                $normalizedData[]=[
                    'provider'=>'ad1',
                    'hotel_name'=> $hotel['name'],
                    'hotel_star'=> $hotel['stars'],
                    'code'=> $room['code'],
                    'net_price'=> $room['net_price'],
                    'tax'=> $room['total'] - $room['net_price'],
                    'total_price'=>$room['total']
                ];
            }
        }
        return $normalizedData;
    }

}