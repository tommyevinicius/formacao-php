<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 04/11/17
 * Time: 09:20
 */
require __DIR__ . '/class.php';

class Fusca extends Car
{
    public $car = 'Gol';

    function run()
    {
        return $this->car;
    }
}

$car = new Fusca();

print $car->run();