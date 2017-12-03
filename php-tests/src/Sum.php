<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 03/12/17
 * Time: 11:20
 */
namespace Code;

use PHPUnit\Runner\Exception;

class Sum
{
    private $num1;
    private $num2;

    public function __construct($num1 = null, $num2 = null)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function sum()
    {
        if (is_null($this->num1) || is_null($this->num2))
        {
            throw new \Exception("Informe dois numeros para somar");
        }

        return $this->num1 + $this->num2;
    }
}