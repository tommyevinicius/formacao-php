<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 08:57
 */

class Car
{
    public $color;
    public $car;

    public function run()
    {
        return $this->car . ' is running';
    }
}

$car = new Car();
$car->car = 'Ferrari';
