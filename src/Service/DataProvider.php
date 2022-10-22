<?php


namespace Corexc\Service;


abstract class DataProvider
{
    public abstract function dataSource();
    public abstract function getData($data);
}