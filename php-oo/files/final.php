<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 10:56
 */

final class Car
{
    public function getCar()
    {
        return __CLASS__;
    }
}

$car = new Car();
$car->getCar();