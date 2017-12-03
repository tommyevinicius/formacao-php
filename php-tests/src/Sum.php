<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 03/12/17
 * Time: 11:20
 */
namespace Code;

class Sum
{
    public function sum($num1 = null, $num2 = null)
    {
        if (is_null($num1) || is_null($num2))
        {
            throw new \Exception("Informe dois numeros para somar");
        }

        return $num1 + $num2;
    }
}