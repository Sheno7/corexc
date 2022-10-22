<?php


namespace Corexc\Service;


class DataCenter
{
    private $data = [];

    public function addProvider(DataProvider $dataProvider)
    {
        //add room to data center
        foreach ($dataProvider->dataSource() as $room){
            $add=true;
            foreach ($this->data as $key=> $storedRoom){
                //check if room added before
                if($storedRoom['code']==$room['code'] && $storedRoom['hotel_name']==$room['hotel_name'] ){
                    if($storedRoom['total_price'] > $room['total_price'] ){
                        //add the lowest price
                        $this->data[$key]=$room;
                    }
                    $add=false;
                    break;
                }
            }
            if($add){
                $this->data[]=$room;
            }
        }
    }

    public function getData(){
         //sort data by price
         array_multisort(array_column($this->data,'total_price'),SORT_ASC, SORT_NATURAL|SORT_FLAG_CASE,$this->data);
         return $this->data;
    }
}